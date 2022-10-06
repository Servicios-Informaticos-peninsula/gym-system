<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Membership;
use App\Models\MembershipPay;
use Illuminate\Http\Request;

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

                    $list = new \stdClass();

                    $list->name = $pro->name;


                    $gridProductos[] = $list;


                }


                return $gridProductos;

            }else{
                $membresia =  MembershipPay::where('reference_line',$request->producto)
                ->get();

                foreach ($membresia as $memb) {

                    $list = new \stdClass();

                    $list->name = $memb->reference_line;

                    $gridProductos[] = $list;



                }


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
