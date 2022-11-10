<?php

namespace App\Http\Controllers;
use ArielMejiaDev\LarapexCharts\LarapexChart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Carts;
use Carbon\Carbon;

class EstadisticasController extends Controller
{
    //
    public function index()
    {
        return view('statistics.index');
    }
    public function masVendidoChart(Request $request){

        $fecha = Carbon::createFromDate($request->anio,$request->mes,01);
        $inicial = $fecha->toDateString();
        $final =$fecha->addMonths(1)->toDateString();

        // dd($inicial, $final);



        $productos = Carts::select("products.name",DB::raw("sum(carts_has_products.quantity) as total"))
        ->join("carts_has_products", "carts.id","=", "carts_has_products.carts_id", )
        ->join("products", "carts_has_products.products_id", "=", "products.id")
        ->join("inventories", "products.id", "=", "inventories.products_id")
        ->whereBetween('carts_has_products.created_at', [$inicial, $final])
        ->groupBy("products.name")
        ->orderBy('total','desc')
        ->get()->toArray();

        // dd($productos);

        return response()->json([
            'lSuccess' => true,
            'data' => $productos,
        ]);


    }
}
