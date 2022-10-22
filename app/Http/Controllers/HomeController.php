<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('sales.sale', compact('origenMembresias','referenciaMembresia'));
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
