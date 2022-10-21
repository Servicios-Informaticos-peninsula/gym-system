<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipRequest;
use App\Models\Membership;
use App\Models\MemberShipMembershipPay;
use App\Models\MembershipPay;
use App\Models\MembershipType;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Membership = Membership::orderBy('id','asc')->paginate(10);
        $membership_types = MembershipType::all();
        $clients = User::role('Cliente')->get();

        // dd($membership_types);

        return view('Membership.index', compact('Membership', 'membership_types', 'clients'));
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
    public function store(Request $request)
    {

        try {
            $reference = mt_rand(00000000001, 9999999990);

            DB::beginTransaction();

            $Membership = Membership::create([
                'users_id' => $request->users_id,
                'init_date' => Carbon::now()->format('Y-m-d'),
                'membership_types_id' => $request->membership_type,
                'carts_id' => '',
                'asigned_by' => Auth::id(),
            ]);

            $type = MembershipType::where('id', $Membership->membership_types_id)->first();
            $fecha_inicio = $Membership->init_date;
            $dias = (int) $type->days;
            $fecha_vencimiento = date('Y-m-d', strtotime($fecha_inicio . ' +' . $dias . ' days'));
            Membership::where('id', $Membership->id)
                ->update(
                    ['expiration_date' => $fecha_vencimiento]

                );
            $pay = MembershipPay::create([
                'reference_line' => $Membership->id . $reference . "M",
            ]);

            $pay_membership = MemberShipMembershipPay::create([
                'memberships_id' => $Membership->id,
                'membership_pays_id' => $pay->id,
            ]);

            // $pivot = MemberShipMembershipPay::create([
            //     'memberships_id' => $Membership->id,
            //     'membership_pays_id' => $pay->id,
            // ]);
            DB::commit();

            $origenMembresias = true;
            $referenciaMembresia =$pay->reference_line;
            // dd();
            //return redirect()->back()->with('success', 'Registro Éxitoso!');
            return view('sales.sale', compact('origenMembresias','referenciaMembresia'));

        } catch (Exception $e) {
            DB::rollback();
            dd($e);
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
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema, porfavor Intente nuevamente!');
        }
    }
}
