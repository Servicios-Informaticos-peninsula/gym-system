<?php

namespace App\Http\Controllers;

use App\Models\CorteCaja;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CorteCajaController extends Controller
{
    public function index(){
        return view ('corte_caja.index');
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
return redirect()->back()->with('success','Ha registrado su dinero base de manera exitosa!!');


    }
}
