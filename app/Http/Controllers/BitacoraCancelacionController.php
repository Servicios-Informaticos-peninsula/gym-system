<?php

namespace App\Http\Controllers;

use App\Models\BitacoraCancelacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BitacoraCancelacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bitacoras.cancelacion');
    }

    public function getCancelacion()
    {
        $bitacora = BitacoraCancelacion::join('carts', 'bitacora_cancelacions.carts_id', '=', 'carts.id')
            ->join('users', 'bitacora_cancelacions.userCreator', '=', 'users.id')
            ->select('users.name', 'bitacora_cancelacions.cSistema', 'carts.numero_venta', 'bitacora_cancelacions.motivo')->get();

        return $bitacora;
    }
    public function indexVentas()
    {

            return view('bitacoras.ventas');


    }

    public function getVentas()
    {
        $cart = DB::table('vouchers')->join('carts', 'vouchers.carts_id', '=', 'carts.id')
        ->leftjoin('carts_has_products', 'carts.id', '=', 'carts_has_products.carts_id')
        ->join('products', 'carts_has_products.products_id', '=', 'products.id')
        ->leftjoin('inventories', 'products.id', '=', 'inventories.products_id')
        ->join('users', 'carts.clients_id', '=', 'users.id')

         ->select('*')
        ->get();

        return $cart;
    }
}
