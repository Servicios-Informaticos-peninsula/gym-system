<?php

namespace App\Http\Controllers;

use App\Models\CorteCaja;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $corte->hora_inicio = $carbon;
        $corte->cantidad_inicial = $request->cantidad_inicial;


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
            ->select('corte_cajas.lActivo', 'corte_cajas.id', 'corte_cajas.user_id', 'corte_cajas.cantidad_inicial', 'vouchers.price_total')
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
                'corte_caja_id' => $caja->id,
            ]
        );

        return response()->json([
            'data' => $array,
            'lSuccess' => true,
        ]);
    }
    public function update(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'fondo_caja' => 'required',
                'cantidad_final' => 'required',
                'total_venta' => 'required',
                'diferencia' => 'required',

            ], [
                'fondo_caja.required' => 'El campo de fondo de caja debe estar ocupado de datos',
                'cantidad_final.required' => 'El campo cantidad de cierre debe estar ocupado de datos',
                'total_venta.required' => 'El campo de total de venta debe estar ocupado de datos',
                'diferencia.required' => 'El campo de diferencia debe estar ocupado de datos',

            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->with('error', 'Faltan campos por llenar, favor de verificar')
                    ->withErrors($validator)
                    ->withInput();

            } else {

                $fecha_final = Carbon::now()->format('Y-m-d');
                $hora_final = Carbon::now()->format('H:m:s');

                $corte = CorteCaja::where('id', $request->id)->update(array(
                    'fecha_final' => $fecha_final,
                    'hora_final' => $hora_final,
                    'cantidad_final' => $request->cantidad_final,
                    'total_venta' => $request->total_venta,
                    'diferencia' => $request->diferencia,
                    'lActivo' => false,

                ));

                return redirect()->back()->with('success', '¡Se cerro la caja de manera exitosa de forma exitosa!');
            }

        } catch (\Throwable $th) {

            return back()->with('error', 'Hubo un error al agregar los datos. Verifique los datos.');
        }

    }

}
