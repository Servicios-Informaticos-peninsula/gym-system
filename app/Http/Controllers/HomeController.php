<?php

namespace App\Http\Controllers;

use App\Models\CorteCaja;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $ip = request()->ip();
            var_dump($ip);
            $origenMembresias = false;
            $referenciaMembresia = "";
            $carbon = Carbon::now()->format('Y-m-d');
            $user = Auth::id();
            $excedido = false;
            $cConsulta = CorteCaja::where('user_id', $user)
                ->where('lActivo', true)
                ->count();

            if ($cConsulta > 0) {
                $cConsulta = CorteCaja::where('user_id', $user)
                    ->where('lActivo', true)
                    ->first();

                if ($carbon > $cConsulta->fecha_inicio) {

                    $excedido = true;
                    $cConsulta = CorteCaja::where('fecha_inicio', $cConsulta->fecha_inicio)
                    ->where('lActivo',true)
                        ->where('user_id', $user)
                        ->count();
                } else {

                    $cConsulta = CorteCaja::where('fecha_inicio', $carbon)
                        ->where('user_id', $user)
                        ->count();
                }
            }

            $corteCount = Voucher::join('corte_cajas', 'vouchers.corte_cajas_id', '=', 'corte_cajas.id')
                ->where('corte_cajas.user_id', $user)
                ->where('corte_cajas.lActivo', true)
                ->select('corte_cajas.lActivo', 'corte_cajas.user_id', 'corte_cajas.cantidad_inicial', 'vouchers.price_total')
                ->count();

            return view('sales.sale', compact('origenMembresias', 'referenciaMembresia', 'cConsulta', 'corteCount', 'excedido','ip'));
        } catch (\Throwable $th) {
            return redirect()->back();
        }

    }
    public function index2(Request $request)
    {
        $ip = request()->ip();
        $carbon = Carbon::now()->format('Y-m-d');
        $user = Auth::id();
        $origenMembresias = $request->origenMembresias;
        $referenciaMembresia = $request->referenciaMembresia;
        $excedido = false;
            $cConsulta = CorteCaja::where('user_id', $user)
                ->where('lActivo', true)
                ->count();

            if ($cConsulta > 0) {
                $cConsulta = CorteCaja::where('user_id', $user)
                    ->where('lActivo', true)
                    ->first();
                if ($carbon > $cConsulta->fecha_inicio) {

                    $excedido = true;
                    $cConsulta = CorteCaja::where('fecha_inicio', $cConsulta->fecha_inicio)
                    ->where('lActivo',true)
                        ->where('user_id', $user)
                        ->count();
                } else {

                    $cConsulta = CorteCaja::where('fecha_inicio', $carbon)
                        ->where('user_id', $user)
                        ->count();
                }
            }

        $corteCount = Voucher::join('corte_cajas', 'vouchers.corte_cajas_id', '=', 'corte_cajas.id')
            ->where('corte_cajas.user_id', $user)
            ->where('corte_cajas.lActivo', true)
            ->select('corte_cajas.lActivo', 'corte_cajas.user_id', 'corte_cajas.cantidad_inicial', 'vouchers.price_total')
            ->count();
        return view('sales.sale', compact('origenMembresias', 'referenciaMembresia', 'cConsulta', 'corteCount','excedido','ip'));
    }
    public function home()
    {
        return view('home');
    }
}
