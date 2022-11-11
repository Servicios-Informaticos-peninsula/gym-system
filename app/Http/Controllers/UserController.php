<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::role('Cliente')->withTrashed()
            ->paginate(10);
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
    public function store(Request $request)
    {

        // $request->validate( [
        //         'name' => 'required',
        //         'surnames' => 'required',
        //         'email' => 'required',
        //         'phone' => 'required',
        //         'contact_phone' => 'required',
        //     ],   [
        //         //identificacion

        //         'name.required' => 'El campo de fecha de la entrevista es obligatorio',
        //         'surnames.required' => 'El campo de ocupacion es obligatorio',

        //         'email.required' => 'El campo de fecha de nacimiento es obligatorio',
        //         'phone.required' => 'El campo de edad es obligatorio',
        //         'contact_phone.required' => 'El campo de nombre es obligatorio',

        //     ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'surnames' => 'required', 'string', 'max:255',
            'email' => 'required|unique:users|string',
            'phone' => 'required|max:10',
            'contact_phone' => 'required|max:10',
            'ocupation' => 'required',
            'born' => 'required',
        ], [
            'name.required' => 'El campo de nombre es obligatorio',
            'name.string' => 'El campo de nombre debe ser texto',
            'surnames.required' => 'El campo de apellidos es obligatorio',
            'email.required' => 'El campo de email es obligatorio',
            'email.unique' => 'El campo de email es unico',
            'phone.required' => 'El campo de telefono es obligatorio',
            'contact_phone.required' => 'El campo de número de contacto es obligatorio',
            'ocupation.required' => 'El campo de ocupacion es obligatorio',
            'born.required' => 'El campo de fecha de nacimiento es obligatorio',

        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->all();

            foreach ($error as $validador) {
                return redirect()
                    ->back()
                    ->with('error', $validador)
                    ->withInput();
            }

            // dd($encode);

        } else {
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
                    'code_user' => 0,
                    'email' => $request->get('email'),
                    'phone' =>"+52". $request->get('phone'),
                    'contact_phone' => $request->contact_phone,
                    'ocupation' => $request->get('ocupation'),
                    'born' => $request->get('born'),
                    'age' => $age,
                    'password' => Hash::make('123456'),
                ]);

                $user->assignRole('cliente');
                $user_code = User::where('id', $user->id)->first();

                $us = User::where('id', $user_code->id)
                    ->update([
                        'code_user' => "000" . $user_code->id,
                    ]);

                return back()->with('success', '¡Se agrego el usuario de forma exitosa!');
            } catch (\Throwable $th) {
                return redirect()
                    ->back()
                    ->with('error', $th->getMessage())
                    ->withInput();
            }

        }

        // } catch (\Throwable $th) {

        //     $errors = new BitacoraError();
        //     $json_encode = $th->getMessage();
        //     $errors->error = $json_encode;
        //     $errors->modulo = "users_clients";
        //     $errors->save();
        //     return redirect()
        //     ->back()
        //     ->with('error', 'Verifique la informacion o contacte con soporte')
        //     ->withInput();
        //     // return back()->with('success', '¡Se agrego el usuario de forma exitosa!');
        // }

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
        $record = Record::findOrFail($id);
        return view('records.update');
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
    public function edit_user()
    {
        $usuario = User::find(Auth::User()->id);
        if (empty($usuario)) {

            return redirect()->back()->with('error','Problemas al cargar su Perfil');
        }
        return view('auth.edit')->with('usuario', $usuario);
    }

    public function update_user(Request $request)
    {
        $usuario = User::find(Auth::User()->id);
        if (empty($usuario)) {
            return redirect()->back()->with('error','Problemas al cargar su Perfil');

        }
        //dd($usuario->password);
       // $decrypt =Crypt::encrypt($usuario->password);

        //dd($request->all());
        $usuario->name = $request->name;
        $usuario->surnames = $request->surnames;
        $usuario->username = $request->username;
        $usuario->code_user= $request->code_user;
        $usuario->email = $request->email;
        $usuario->phone = $request->phone;
        $usuario->contact_phone = $request->contact_phone;
        if(!is_null($request->password)){
            $usuario->password = bcrypt($request->password);

        }else{
            $usuario->password =$usuario->password;
        }

        $usuario->ocupation = $request->ocupation;
        $usuario->age = $request->age;
        $usuario->born = $request->born;

        $usuario->update();
        return back()->with('success','El perfil se actualizo con exito');
    }
}
