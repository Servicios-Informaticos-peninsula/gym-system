<?php

namespace App\Http\Controllers;

use App\Models\BitacoraCancelacion;
use App\Models\Carts;
use App\Models\Carts_has_products;
use App\Models\Configurations;
use App\Models\CorteCaja;
use App\Models\Inventory;
use App\Models\Membership;
use App\Models\MembershipPay;
use App\Models\Product;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB as DB;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use stdClass;
use Twilio\Rest\Client;
use PDF;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    public function cashPayment(Request $request)
    {
        //   dd($request->all());

        try {
            $idCorte = 0;
            $usuario = Auth::id();
            DB::beginTransaction();

            $userID = Auth::user()->id; //se debe guardar el id del  cliente o no pero no se a definido

            $numVenta = carts::count(); //numero de venta por definir como se generara

            // dd($request->all());

            $cart = Carts::create([
                'clients_id' => $userID,
                'numero_venta' => $numVenta + 1,
            ]);

            $productos = $request->productos;

            foreach ($request->productos as $lst) {
                $jsonEncode = json_encode($lst);
                $pro = json_decode($jsonEncode);

                Carts_has_products::create([
                    'carts_id' => $cart->id,
                    'products_id' => $pro->id_product,
                    'quantity' => $pro->cantidad,
                    'lMembresia' => $pro->lmembresia == 1 ? true : false,
                ]);

                $corte = CorteCaja::where('lActivo', true)
                    ->where('user_id', $usuario)
                    ->first();

                if (!is_null($corte)) {
                    $idCorte = $corte->id;
                }

                if ($pro->lmembresia == 'true') {
                    $membresia = Membership::join('membership_types', 'memberships.membership_types_id', '=', 'membership_types.id')
                        ->join('membership_membership_pays', 'memberships.id', '=', 'membership_membership_pays.memberships_id')

                        ->join('membership_pays', 'membership_membership_pays.membership_pays_id', '=', 'membership_pays.id')
                        ->where('membership_pays.reference_line', $pro->lineReference)
                        ->select('memberships.id as id', 'membership_pays.reference_line as lineReference', 'membership_types.days as days')
                        ->first();
                    if ($membresia->days == 1) {
                        $expiration_date = Carbon::now();
                    } else {
                        $expiration_date = Carbon::now()->addDay($membresia->days);
                    }

                    Membership::where('memberships.id', $membresia->id)->update([
                        'carts_id' => $cart->id,
                        'expiration_date' => $expiration_date,
                        'estatus_membresia' => 1,
                    ]);

                    MembershipPay::where('reference_line', $membresia->lineReference)->update([
                        'estatus' => 'P',
                    ]);
                } else {
                    $requireInventory = Product::where('id', $pro->id_product)->first();

                    if ($requireInventory->requireInventory) {
                        $cantidad = Inventory::where('products_id', $pro->id_product)->first();
                        $inventory = Inventory::where('products_id', $pro->id_product)->update([
                            'quantity' => $cantidad->quantity - $pro->cantidad,
                        ]);
                        if ($inventory) {
                            $alert = Inventory::where('products_id', $pro->id_product)
                                ->join('products', 'inventories.products_id', '=', 'products.id')
                                ->first();
                            $user = User::role('Admininistrador')->first();
                            if (!is_null($alert->maximun_alert)) {
                                if ($alert->cantdad <= $alert->maximun_alert) {
                                    $mensaje = 'La cantidad del producto ' . $alert->name . ' es de ' . $alert->quantity;
                                    $this->sendMessage($mensaje, $user->phone);
                                }
                            }
                        }
                    }
                }
            }

            switch ($request->tipoPago) {
                case 1:
                    $voucher = Voucher::create([
                        'carts_id' => $cart->id,
                        'quantity' => $request->totalproductos,
                        'price_total' => $request->precioTotal,
                        'vendendor' => $userID,
                        'tipo_pago' => 'EFECTIVO',
                        'cantidad_pagada' => $request->pago,
                        'cambio' => $request->cambio,
                        'estatus' => 'P',
                        'corte_cajas_id' => $idCorte,
                    ]);

                case 2:
                    $voucher = Voucher::create([
                        'carts_id' => $cart->id,
                        'quantity' => $request->totalproductos,
                        'price_total' => $request->precioTotal,
                        'vendendor' => $userID,
                        'tipo_pago' => 'TRANSFERENCIA',
                        'claveo_rastreo' => $request->referenciaPago,
                        'folio_transferencia' => $request->folioTransferencia,
                        'estatus' => 'P',
                        'corte_cajas_id' => $idCorte,
                    ]);

                    break;
                case 3:
                    BitacoraCancelacion::create([
                        'motivo' => $request->motivo,
                        'userCreator' => $userID,
                        'carts_id' => $cart->id,
                        'cSistema' => 'Punto de venta web',
                        //'corte_cajas_id'=>$idCorte,
                    ]);

                    break;
            }
            DB::commit();
            if (isset($voucher)) {
                // dd('hola');
                return response()->json([
                    'lSuccess' => true,
                    'cMensaje' => '',
                    'cobro' => true,
                    'voucher' => $voucher,
                ]);
            } else {
                return response()->json([
                    'lSuccess' => true,
                    'cMensaje' => '',
                    'cobro' => false,
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $th->getMessage(),
            ]);
        }
    }

    public function search(Request $request)
    {
        try {
            $gridProductos = [];

            $producto = Inventory::join('products', 'inventories.products_id', '=', 'products.id')
                ->where('products.bar_code', $request->producto)
                ->where(function ($query) use ($request) {
                    $query->orWhere('products.name', $request->producto);
                    $query->orWhere('products.bar_code', $request->producto);
                })

                ->where('inventories.status', 'Disponible')
                ->where('inventories.quantity', '>=', 1)
                ->get();

            //declaracion negativa

            if (sizeof($producto) > 0) {
                foreach ($producto as $pro) {
                    $list = new stdClass(); //?

                    $list->name = $pro->name;
                    $list->id_product = $pro->id;
                    $list->cantidad = 1;
                    $list->sales_price = $pro->sales_price;
                    $list->quantity = $pro->quantity;
                    $list->lmembresia = false;
                    $list->lineReference = 'noaplica';

                    $gridProductos[] = $list;
                }

                return $gridProductos;
            } else {
                // $membresiaRef =  MembershipPay::where('reference_line',$request->producto)
                // ->first();

                // $lstpay = MemberShipMembershipPay::where('membership_pays_id',$membresiaRef->id)
                // ->get();

                $membresia = Membership::select('memberships.id as id', 'membership_types.name as name', 'membership_types.price as price', 'membership_pays.reference_line as lineReference')
                    ->join('membership_membership_pays', 'memberships.id', '=', 'membership_membership_pays.memberships_id')
                    ->join('membership_pays', 'membership_membership_pays.membership_pays_id', '=', 'membership_pays.id')
                    ->join('membership_types', 'memberships.membership_types_id', '=', 'membership_types.id')
                    ->where('membership_pays.reference_line', $request->producto)
                    ->whereNotIn('membership_pays.estatus', ['P'])
                    ->get();

                //dd($membresia);

                foreach ($membresia as $memb) {
                    $list = new stdClass();

                    $list->name = $memb->name;
                    $list->id_product = $memb->id;
                    $list->cantidad = 1;
                    $list->sales_price = $memb->price;
                    $list->quantity = 'no aplica';
                    $list->lmembresia = true;
                    $list->lineReference = $memb->lineReference;
                    $gridProductos[] = $list;
                }

                // dd($gridProductos);

                return $gridProductos;
            }
        } catch (\Throwable $th) {
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $th->getMessage(),
            ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv('TWILIO_SID');
        $auth_token = getenv('TWILIO_AUTH_TOKEN');
        $twilio_number = getenv('TWILIO_NUMBER');
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
        try {
            $data = DB::table('vouchers')
                ->join('carts', 'vouchers.carts_id', '=', 'carts.id')
                ->leftjoin('carts_has_products', 'carts.id', '=', 'carts_has_products.carts_id')
                ->join('products', 'carts_has_products.products_id', '=', 'products.id')
                ->leftjoin('inventories', 'products.id', '=', 'inventories.products_id')
                ->join('users', 'carts.clients_id', '=', 'users.id')
                ->where('vouchers.id', $request->id)

                ->first();
            $cart = DB::table('vouchers')
                ->join('carts', 'vouchers.carts_id', '=', 'carts.id')
                ->leftjoin('carts_has_products', 'carts.id', '=', 'carts_has_products.carts_id')
                ->join('products', 'carts_has_products.products_id', '=', 'products.id')
                ->leftjoin('inventories', 'products.id', '=', 'inventories.products_id')
                ->join('users', 'carts.clients_id', '=', 'users.id')
                ->where('vouchers.id', $request->id)
                ->select('products.name', 'carts_has_products.quantity', 'inventories.sales_price')
                ->get();

            $fecha = DB::table('vouchers')
                ->where('vouchers.id', $request->id)
                ->first();

            $logo = EscposImage::load('img/logo-ticket.png', false);
            $impresora = Configurations::getConfiguracion('IMPRESORATICKETS');
            // dump($impresora);
            $nombreImpresora = $impresora;
            $connector = new WindowsPrintConnector($nombreImpresora);
            $impresora = new Printer($connector);
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->bitImage($logo);
            $impresora->setEmphasis(true);
            $impresora->text("Ticket de venta\n");
            $impresora->text("Spacio Fems\n");
            $impresora->text("C. 84 97297 Merida, Yuc.\n");
            $impresora->text($fecha->created_at . "\n");

            $impresora->setEmphasis(false);
            $impresora->text("\n===============================\n");

            foreach ($cart as $lst) {
                $subtotal = $lst->quantity * $lst->sales_price;

                $impresora->setJustification(Printer::JUSTIFY_LEFT);
                $impresora->text(sprintf("%.2f x %s\n", $lst->quantity, $lst->name));
                $impresora->setJustification(Printer::JUSTIFY_RIGHT);
                $impresora->text('$' . number_format($subtotal, 2) . "\n");
            }
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->text("\n===============================\n");
            $impresora->setJustification(Printer::JUSTIFY_RIGHT);
            $impresora->setEmphasis(true);
            $impresora->text("Total: $" . number_format($data->price_total, 2) . "\n");
            $impresora->text("Cambio: $" . number_format($data->cambio, 2) . "\n");
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->setTextSize(1, 1);
            $impresora->text("\n");
            $impresora->text("Gracias por su compra\n");
            $impresora->text("PAGO EN UNA SOLA EXHIBICION\n");
            $impresora->text("LUGAR DE EXHIBICION: MERIDA,YUC.\n");
            $impresora->text("EMAIL: abi_vid@hotmail.com\n");
            $impresora->text("TELEFONO: 999 242 5792\n");
            $impresora->feed(5);
            $impresora->pulse();
            $impresora->close();

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => 'ticket Impreso',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => 'error',
            ]);
        }
    }

    public function enviarTicket()
    {
        $impresora = Configurations::getConfiguracion('IMPRESORATICKETS');
        // dump($impresora);
        $nombreImpresora = $impresora;
        $connector = new WindowsPrintConnector($nombreImpresora);
        $impresora = new Printer($connector);

        $impresora->pulse();
        $impresora->close();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verTicket($id)
    {
        $data = DB::table('vouchers')
            ->join('carts', 'vouchers.carts_id', '=', 'carts.id')
            ->leftjoin('carts_has_products', 'carts.id', '=', 'carts_has_products.carts_id')
            ->join('products', 'carts_has_products.products_id', '=', 'products.id')
            ->leftjoin('inventories', 'products.id', '=', 'inventories.products_id')
            ->join('users', 'carts.clients_id', '=', 'users.id')
            ->where('vouchers.carts_id', $id)

            ->first();

        $cart = DB::table('vouchers')
            ->join('carts', 'vouchers.carts_id', '=', 'carts.id')
            ->leftjoin('carts_has_products', 'carts.id', '=', 'carts_has_products.carts_id')
            ->join('products', 'carts_has_products.products_id', '=', 'products.id')
            ->leftjoin('inventories', 'products.id', '=', 'inventories.products_id')
            ->join('users', 'carts.clients_id', '=', 'users.id')
            ->where('vouchers.carts_id', $id)
            ->select('products.name', 'carts_has_products.quantity', 'inventories.sales_price')
            ->get();

        //         $cart = DB::table('vouchers')->join('carts', 'vouchers.carts_id', '=', 'carts.id')
        // ->leftjoin('carts_has_products', 'carts.id', '=', 'carts_has_products.carts_id')
        // ->join('products', 'carts_has_products.products_id', '=', 'products.id')
        // ->leftjoin('inventories', 'products.id', '=', 'inventories.products_id')
        // ->join('users', 'carts.clients_id', '=', 'users.id')
        // ->where('vouchers.carts_id', $id)
        // ->select('products.name', 'carts_has_products.quantity', 'inventories.sales_price')
        // ->get();

        //         $fecha = DB::table('vouchers')
        //     ->where('vouchers.carts_id', $id)
        // ->first();
        //       $pdf = PDF::loadView('sales/pdf/ticket', compact('data', 'cart', 'fecha'))
        //          ->setPaper('A4', 'portrait');
        //  $pdf->output();




        //         $filename = "ticket.pdf";
        //  return $pdf->stream($filename);
        $fecha = DB::table('vouchers')
            ->where('vouchers.carts_id', $id)
            ->first();
        $pdf = PDF::loadView('sales/pdf/ticket', compact('data', 'cart', 'fecha'))->setPaper('A4', 'portrait');
        $pdf->output();

        $filename = 'ticket.pdf';
        return $pdf->stream($filename);
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
