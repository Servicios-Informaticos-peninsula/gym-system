<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipRequest;
use App\Models\Membership;
use App\Models\MembershipType;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membership = Membership::paginate(10);
        $membership_types = MembershipType::all();
        $clients = User::role('Client')->get();

        return view('Membership.index', compact('membership', 'membership_types', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // NO IMPLEMENT
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembershipRequest $request)
    {
        try {
            Membership::create([
                'user_id' => $request->users_id,
                'init_date' => $request->init_date,
                'expiration_date' => $request->expiration_date,
                'membership_types_id' => $request->membership_type,
                'asigned_by' => Auth::id()
            ]);

            return redirect()->back()->with('success', 'Registro Éxitoso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Surgio un problema, Intenta de nuevo!');
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
    public function update(MembershipRequest $request, $id)
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
            Membership::find($id)->delete();
            return redirect()->back()->with('success', 'Eliminación Éxitosa!');
        } catch (Exception) {
            return redirect()->back()->with('error', 'Hubo un problema, porfavor Intente nuevamente!');
        }
    }
}
