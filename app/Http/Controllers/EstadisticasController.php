<?php

namespace App\Http\Controllers;
use ArielMejiaDev\LarapexCharts\LarapexChart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Carts;

class EstadisticasController extends Controller
{
    //
    public function index()
    {
        $productos = Carts::select("products.name",DB::raw("sum(carts_has_products.quantity) as total"))
        ->join("carts_has_products", "carts.id","=", "carts_has_products.carts_id", )
        ->join("products", "carts_has_products.products_id", "=", "products.id")
        ->join("inventories", "products.id", "=", "inventories.products_id")
        ->groupBy("products.name")
        ->orderBy('total','desc')
        ->get()->toArray();

        // dd($productos);

        $chart;
        // dd($ventasArray["total"]);
        if(sizeof($productos)>0){
            $chart = (new LarapexChart)->barChart()
            ->setTitle('Productos mas vendidos')
            ->setSubtitle('Octubre.')
            ->addData($productos[0]["name"], [$productos[0]["total"]])

            ->setXAxis(['octubre','noviembre','diciembre']);
        }else{
            $chart = (new LarapexChart)->barChart()
            ->setTitle('Productos mas vendidos')
            ->setSubtitle('Octubre.')

            ->setXAxis(['octubre','noviembre','diciembre']);
        }
        if(sizeof($productos)>1){
            $chart = (new LarapexChart)->barChart()
            ->setTitle('Productos mas vendidos')
            ->setSubtitle('Octubre.')
            ->addData($productos[0]["name"], [$productos[0]["total"]])
            ->addData($productos[1]["name"], [$productos[1]["total"]])
            ->setXAxis(['octubre','noviembre','diciembre']);

        }
        if(sizeof($productos)>2){
            $chart = (new LarapexChart)->barChart()
            ->setTitle('Productos mas vendidos')
            ->setSubtitle('Octubre.')
            ->addData($productos[0]["name"], [$productos[0]["total"]])
            ->addData($productos[1]["name"], [$productos[1]["total"]])
            ->addData($productos[2]["name"], [$productos[2]["total"]])

            ->setXAxis(['octubre','noviembre','diciembre']);
        }




        return view('statistics.index',compact('chart'));
    }
}
