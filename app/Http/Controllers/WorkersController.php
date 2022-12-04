<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkersRequests;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = User::role('Empleado')->paginate(10);
        $roles = Role::all();

        return view('Workers.index', compact('workers', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkersRequests $request)
    {
        try {
            $anio = Carbon::parse($request->get('born'))->format('Y');
            $dia = Carbon::parse($request->get('born'))->format('d');
            $mes = Carbon::parse($request->get('born'))->format('m');
            $anio_actual = Carbon::now()->format('Y');
            $age = $anio_actual - $anio;

            $name = explode(" ", $request->name);
            $surnames = explode(" ", $request->surnames);

            $user = User::create([
                'name' => $request->get('name'),
                'surnames' => $request->get('surnames'),
                'username' => $name[0] . "." . $surnames[0] . $dia . $mes . $anio,
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'born' => $request->get('born'),
                'password' => Hash::make('123456'),
            ]);

            $user->assignRole('Empleado');
            $user_code = User::where('id', $user->id)->first();

            $us = User::where('id', $user_code->id)
                ->update([
                    'code_user' => "000" . $user_code->id,
                ]);

            return back()->with('success', '¡Se agrego al colaborador de forma exitosa!');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
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
    public function update(WorkersRequests $request, $id)
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
    public function updatePermissions(WorkersRequests $request, $id)
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
        try {
            User::find($id)->delete();

            return back()->with('success', '¡Se Elimino al colaborador de forma exitosa!');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }
}
