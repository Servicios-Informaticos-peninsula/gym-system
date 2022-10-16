<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Carts_has_products;
use App\Models\Inventory;
use App\Models\Membership;
use App\Models\MembershipPay;
use App\Models\Product;
use App\Models\Voucher;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB as DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use stdClass;

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

        try {
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

                // dd($pro->lmembresia);

                if ($pro->lmembresia == "true") {

                    $membresia = Membership::select('memberships.id as id', 'membership_pays.reference_line as lineReference')
                        ->join('membership_membership_pays', 'memberships.id', '=', 'membership_membership_pays.memberships_id')
                        ->join('membership_pays', 'membership_membership_pays.membership_pays_id', '=', 'membership_pays.id')
                        ->where('membership_pays.reference_line', $pro->lineReference)
                        ->first();

                    // dd($membresia->lineReference);

                    //asignacion de carrito a membresia de usuario y cambio de estado de pago
                    Membership::where('memberships.id', $membresia->id)
                        ->update([
                            'carts_id' => $cart->id,
                        ]);

                    MembershipPay::where('reference_line', $membresia->lineReference)
                        ->update([
                            'estatus' => 'P',
                        ]);

                } else {

                    $requireInventory = Product::where('id', $pro->id_product)->first();

                    if ($requireInventory->requireInventory) {
                        $cantidad = Inventory::where('products_id', $pro->id_product)->first();
                        Inventory::where('products_id', $pro->id_product)
                            ->update([
                                'quantity' => ($cantidad->quantity) - ($pro->cantidad),
                            ]);
                        // dd($requireInventory->requireInventory);
                    }

                }

            }

            $voucher = Voucher::create([
                'carts_id' => $cart->id,
                'quantity' => $request->totalproductos,
                'price_total' => $request->precioTotal,
                'vendendor' => $userID,
                'tipo_pago' => "EFECTIVO",
                'cantidad_pagada' => $request->pago,
                'cambio' => $request->cambio,
                'estatus' => "P",

            ]);
            DB::commit();

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => "",
                'voucher' => $voucher,
            ]);

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
                ->orWhere('products.name', $request->producto)

                ->where('inventories.status', 'Disponible')
                ->get();

            //declaracion negativa

            if (sizeof($producto) > 0) {

                foreach ($producto as $pro) {

                    $list = new stdClass; //?

                    $list->name = $pro->name;
                    $list->id_product = $pro->id;
                    $list->cantidad = 1;
                    $list->sales_price = $pro->sales_price;
                    $list->quantity = $pro->quantity;
                    $list->lmembresia = false;
                    $list->lineReference = "noaplica";

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

                    $list = new stdClass;

                    $list->name = $memb->name;
                    $list->id_product = $memb->id;
                    $list->cantidad = 1;
                    $list->sales_price = $memb->price;
                    $list->quantity = "no aplica";
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

        $cart = DB::table('vouchers')->join('carts', 'vouchers.carts_id', '=', 'carts.id')
            ->leftjoin('carts_has_products', 'carts.id', '=', 'carts_has_products.carts_id')
            ->join('products', 'carts_has_products.products_id', '=', 'products.id')
            ->join('users', 'carts.clients_id', '=', 'users.id')
            ->where('vouchers.id', $request->id)

            ->get();

        $pdf = PDF::loadView('sales/pdf/ticket', compact('cart'))
            ->setPaper('b7', 'portrait');
        $pdf->output();

        /**PHP indicara que se obtiene el pdf */
        //S $pdf->getDomPDF()->set_option("enable_php", true);
        // $canvas = $pdf->getCanvas();
        // $w = $canvas->get_width();
        // $h = $canvas->get_height();
        // $imageURL = 'img/logo-remo.png';
        // //dd( $imageURL);
        // $imgWidth = 200;
        // $imgHeight = 200;

        // $canvas->set_opacity(.2);
        // $x = (($w - $imgWidth) / 2);
        // $y = (($h - $imgHeight) / 2);

        // $canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight);
        // dd($imageURL, $x, $y, $imgWidth, $imgHeight);

        $filename = "ticket.pdf";
        return $pdf->stream($filename);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
