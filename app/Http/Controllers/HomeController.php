<?php

namespace App\Http\Controllers;

use App\Models\CorteCaja;
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
        $origenMembresias = false;
        $referenciaMembresia = "";
        $carbon = Carbon::now()->format('Y-m-d');
        $user = Auth::id();
        $cConsulta = CorteCaja::where('fecha_inicio', $carbon)
            ->where('user_id', $user)
            ->count();
//dd($cConsulta, $user,$carbon);
        return view('sales.sale', compact('origenMembresias','referenciaMembresia','cConsulta'));
    }
    public function index2(Request $request)
    {
        $origenMembresias = $request->origenMembresias;
        $referenciaMembresia = $request->referenciaMembresia;

        return view('sales.sale',compact('origenMembresias','referenciaMembresia'));
    }
    public function home()
    {
        return view('home');
    }
}
