<?php

namespace App\Http\Controllers;

use App\Models\PsychobiologicalHabits;
use App\Models\Record;
use App\Models\User;
use App\Models\WeightControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('records.index');
    }
    public function getuser(Request $request)
    {

        $user = User::where('id', $request->user_id)
            ->first();
        return $user;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::orderBy('id', 'asc')->get();
        return view('records.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carbon = Carbon::now();
        try {
            DB::beginTransaction();
            $user = User::where('id', $request->users_id)->update(array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'ocupation' => $request->ocupation,
                'age' => $request->age,
                'born' => $request->born,
            ));

            $record = new Record();
            /**cronicas */
            $record->date_interview = $request->date_interview;
            $record->hipertension = $request->has('hipertension');
            $record->asma = $request->has('asma');
            $record->epilepsia = $request->has('epilepsia');
            $record->ciatica = $request->has('ciatica');
            $record->diabetes = $request->has('diabetes');
            $record->lumbagia = $request->has('lumbagia');
            $record->arritmia = $request->has('arritmia');
            /**mentales */
            $record->ansiedad = $request->has('ansiedad');
            $record->depresion = $request->has('depresion');
            $record->depre_postparto = $request->has('depre_postparto');
            $record->estres_cronico = $request->has('estres_cronico');
            $record->estres_postraumatico = $request->has('estres_postraumatico');

            /**ETS */
            $record->papiloma_humano = $request->has('papiloma_humano');
            $record->herpes = $request->has('herpes');
            $record->sifilis = $request->has('sifilis');
            $record->gonorrea = $request->has('gonorrea');
            $record->sida = $request->has('sida');
            $record->clamidia = $request->has('clamidia');
            /**fisicas */
            $record->desmayos = $request->has('desmayos');
            $record->mareos = $request->has('mareos');
            $record->perdida_conocimiento = $request->has('perdida_conocimiento');
            $record->hospitalizacion = $request->has('hospitalizacion');
            /**hospitalizaciones */
            $record->causa = $request->causa;
            $record->fecha_hospitalizacion = $request->fecha_hospitalizacion;
            /**cirugias */
            $record->cesarea = $request->has('cesarea');
            $record->abortos = $request->has('abortos');
            $record->apendice = $request->has('apendice');
            $record->vesicula = $request->has('vesicula');
            $record->otro = $request->has('otro');
            $record->fecha_cirugia = $request->fecha_cirugia;
            $record->causa_cirugia = $request->causa_cirugia;
            $record->especifique_text = $request->especifique_text;
            /**sintomas */
            $record->alergias = $request->has('alergias');
            $record->cefaleas = $request->has('cefaleas');
            $record->vision_borrosa = $request->has('vision_borrosa');
            $record->cancer = $request->has('cancer');
            $record->ausencia_organos = $request->has('ausencia_organos');
            $record->embarazos = $request->has('embarazos');
            $record->aborto = $request->has('aborto');
            $record->metodo_anticonceptivo = $request->has('metodo_anticonceptivo');
            $record->craneocefalico = $request->has('craneocefalico');
            $record->cervicales = $request->has('cervicales');
            $record->medicamentos = $request->medicamentos;
            $record->numero_control = 1;
            $record->users_id = $request->users_id;
            $record->save();

           PsychobiologicalHabits::created([
                'numero_comidas' => $request->numero_comidas,
                'horas_descanso' => $request->horas_descanso,
                'micciones_dia' => $request->micciones_dia,
                'micciones_noche' => $request->micciones_noche,
                'evacuaciones' => $request->evacuaciones,
                'tabaco' => $request->tabaco,
                'alcohol' => $request->alcohol,
                'marihuana' => $request->has('marihuana'),
                'opiaceos' => $request->has('opiaceos'),
                'cocaina' => $request->has('cocaina'),
                'heroina' => $request->has('heroina'),
                'pastillas' => $request->has('pastillas'),
                'crack' => $request->has('crack'),
                'resistol' => $request->has('resistol'),
                'gasolina' => $request->has('gasolina'),
                'thiner' => $request->has('thiner'),
                'cristal' => $request->has('cristal'),
                'records_id' => $record->id,
            ]);
            WeightControl::created([
                'fecha_visita' => $carbon,
                'peso' => $request->peso,
                'IMC' => $request->IMC,
                'grasa' => $request->grasa,
                'musculo' => $request->musculo,
                'KCAL' => $request->KCAL,
                'edad_blo' => $request->edad_blo,
                'visceral' => $request->visceral,
                'busto' => $request->busto,
                'cintura' => $request->cintura,
                'cadera' => $request->cadera,
                'brazo_der' => $request->brazo_der,
                'brazo_izq' => $request->brazo_izq,
                'pierna_der' => $request->pierna_der,
                'records_id' => $record->id,

            ]);

            DB::commit();
            return back()->with('success', '¡Se agrego el expediente del usuario de forma exitosa!');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return back()->with('error', 'Hubo un error al agregar los datos. Verifique los datos.');
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
        //
    }
}
