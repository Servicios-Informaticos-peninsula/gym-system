<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipTypeRequest;
use App\Models\MembershipType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MembershipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membershipTypes = MembershipType::paginate('10');

        return view('Membership-type.index', compact('membershipTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // NO IMPLEMENTET
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'price' => 'required', 'string', 'max:255',
            'category' => 'required',

        ], [
            'name.required' => 'El campo de nombre es obligatorio',
            'name.string' => 'El campo de nombre debe ser texto',
            'price.required' => 'El campo de Precio Membresia es obligatorio',
            'category.required' => 'El campo de cateogoria es obligatorio',

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

                $membership = MembershipType::create([
                    'name' => $request->get('name'),
                    'price' => $request->get('price'),
                    'category' => $request->category,
                ]);
                // $membership = new MembershipType();
                // $membership->name = $request->get('name');
                // $membership->price = $request->price;
                // $membership->category = $request->get('category');
                // $membership->save();
                // MembershipType::create([
                //     'name' => $request->name,
                //     'price' => $request->price,
                // ]);
// dd($membership);
                return redirect()
                    ->back()
                    ->with('success', 'Registro Éxitoso!');
            } catch (Exception $e) {

                return redirect()
                    ->back()
                    ->with('error', "Error al guardar el archivo" . $e->getMessage())
                    ->withInput();
            }
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
        // NO IMPLEMENTET
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MembershipTypeRequest $request, $id)
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
            MembershipType::find($id)->delete();

            return redirect()
                ->back()
                ->with('success', 'Eliminación Éxitosa!');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e);
        }
    }
}
