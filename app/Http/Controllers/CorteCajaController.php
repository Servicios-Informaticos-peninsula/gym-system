<?php

namespace App\Http\Controllers;

use App\Models\CorteCaja;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CorteCajaController extends Controller
{
    public function index()
    {
        return view('corte_caja.index');
    }
    public function store(Request $request)
    {
        $carbon = Carbon::now();
        $corte = new CorteCaja();
        $corte->user_id = Auth::id();
        $corte->fecha_inicio = $carbon;
        $corte->fecha_final = $carbon;
        $corte->cantidad_inicial = $request->cantidad_inicial;
        $corte->cantidad_final = 0;
        $corte->ganancia = 0;
        $corte->lActivo = true;
        $corte->save();
        return redirect()->back()->with('success', 'Ha registrado su dinero base de manera exitosa!!');

    }

    public function getData(Request $request)
    {

        $cantidad_ventas = 0;
        $array = array();


        $corte = Voucher::join('corte_cajas', 'vouchers.corte_cajas_id', '=', 'corte_cajas.id')
            ->where('corte_cajas.user_id', $request->usuario)
            ->where('corte_cajas.lActivo', true)
            ->select('corte_cajas.lActivo', 'corte_cajas.user_id', 'corte_cajas.cantidad_inicial', 'vouchers.price_total')
            ->get();
        foreach ($corte as $caja) {

            $cantidad_ventas = $cantidad_ventas + $caja->price_total;
        }

        $array =
            (
            [
                'user_id' => $caja->user_id,
                'cantidad_inicial' => $caja->cantidad_inicial,
                'total_ventas' => $cantidad_ventas,
            ]
        );

        return response()->json([
            'data' => $array,
            'lSuccess' => true,
        ]);
    }
}
