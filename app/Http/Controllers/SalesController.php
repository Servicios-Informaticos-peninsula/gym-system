<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Membership;
use App\Models\MemberShipMembershipPay;
use App\Models\MembershipPay;
use Illuminate\Http\Request;
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

    public function search(Request $request)
    {
        try {

            $gridProductos=[];


            $producto = Inventory::join('products', 'inventories.products_id', '=', 'products.id')
                ->where('products.bar_code', $request->producto)
                ->orWhere('products.name', $request->producto)

                ->where('inventories.status', 'Disponible')
                ->get();

//declaracion negativa

            if(sizeof($producto) > 0 ){

                foreach ($producto as $pro) {

                    $list = new stdClass;//?

                    $list->name =$pro->name;
                    $list->id_product = $pro->id;
                    $list->cantidad = 1;
                    $list->sales_price = $pro->sales_price;
                    $list->quantity = $pro->quantity;
                    $list->lmembresia = false;


                    $gridProductos[] = $list;


                }


                return $gridProductos;

            }else{

                // $membresiaRef =  MembershipPay::where('reference_line',$request->producto)
                // ->first();

                // $lstpay = MemberShipMembershipPay::where('membership_pays_id',$membresiaRef->id)
                // ->get();

                $membresia = Membership::select('memberships.id as id','membership_types.name as name','membership_types.price as price',)
                ->join('membership_membership_pays', 'memberships.id', '=', 'membership_membership_pays.memberships_id')
                ->join('membership_pays', 'membership_membership_pays.membership_pays_id', '=', 'membership_pays.id')
                ->join('membership_types', 'memberships.membership_types_id', '=', 'membership_types.id')
                ->where('membership_pays.reference_line',$request->producto)
                ->get();

                // dd($membresia);




                foreach ($membresia as $memb) {

                    $list = new stdClass;

                    $list->name = $memb->name;
                    $list->id_product = $memb->id;
                    $list->cantidad = 1;
                    $list->sales_price = $memb->price;
                    $list->quantity = "no aplica";
                    $list->lmembresia = true;
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
    public function show($id)
    {
        //
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
