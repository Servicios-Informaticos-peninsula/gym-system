<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipTypeRequest;
use App\Models\MembershipType;
use Exception;

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
    public function store(MembershipTypeRequest $request)
    {
        try {
            MembershipType::create([
                'name' => $request->name
            ]);

            return redirect()->back()->with('success', "Registro Éxitoso!");
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e);
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

            return redirect()->back()->with('success', 'Eliminación Éxitosa!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }
}
