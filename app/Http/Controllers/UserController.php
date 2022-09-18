<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::role('Client')->paginate(10);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        try {

            $code = IdGenerator::generate([
                'table' => 'users',
                'length' => 5,
                'prefix' => date('y'),
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->code_user = $code;
            if (is_null($request->email)) {
                $user->email = "N/A";
            } else {
                $user->email = $request->email;
            }

            if (is_null($request->phone)) {
                $user->phone = "N/A";
            } else {
                $user->phone = $request->phone;
            }
            $user->password = 123456;
            //  dd($user);
            $user->save();
            return back()->with('success', '¡Se agrego el usuario de forma exitosa!');

        } catch (\Throwable $th) {
            // dd($th);
            return back()->with('error', 'Hubo un error al agregar los datos. Contacta a soporte del sistema.');
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
    public function update(Request $request, $id)
    {
        try {

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->code_user = $request->code_user;

            $user->email = $request->email;

            $user->phone = $request->phone;

            //  dd($user);
            $user->update();
            return back()->with('updated', '¡Se actualizo el usuario de forma exitosa!');

        } catch (\Throwable $th) {
            dd($th);
            return back()->with('error', 'Hubo un error al agregar los datos. Contacta a soporte del sistema.');
        }
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
            $user = User::find($id);

            $user->delete();

            return back()->with('deleted', 'Se elimino correctamente el registro', $id);
        } catch (\Throwable $th) {
            $exception = $th->getMessage();
            return back()->with(['error' => 'No se pudo eliminar el registro, por favor, contacta a un administrado del sistema.', 'code' => $exception]);
        }
    }
}
