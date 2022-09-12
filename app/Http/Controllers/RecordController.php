<?php

namespace App\Http\Controllers;

use App\Models\PsychobiologicalHabits;
use App\Models\Record;
use App\Models\User;
use App\Models\WeightControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //     $user = Record::join('users', 'records.users_id', '=', 'users.id')
        //     ->select('users.id', 'users.name', 'users.code_user')
        //     ->orderBy('users.id', 'asc')
        //    ->distinct()
        //     ->get();
        $user = User::orderBy('id', 'asc')
            ->distinct()
            ->get();

        return view('records.index', compact('user'));
    }
    public function getuser(Request $request)
    {

        $user = User::where('id', $request->user_id)
            ->first();
        return $user;
    }
    public function getUserCode(Request $request)
    {
        $lstDatos = User::where('name', $request->name)

            ->get();
        return $lstDatos;

    }
    public function getList(Request $requestd)
    {

        $list_expediente = WeightControl::join('records', 'weight_controls.records_id', '=', 'records.id')
            ->join('users', 'records.users_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.code_user')
            ->orderBy('users.code_user', 'desc')
            ->distinct()
            ->get();

        return $list_expediente;

    }
    public function getRecord(Request $request)
    {
        // dd($request->all());
        //     $record = WeightControl::where('users_id',$request->user_id)
        //     ->join('records', 'weight_controls.records_id', '=', 'records.id')
        //     ->join('users', 'records.users_id', '=', 'users.id')
        //     ->select('records.id',)

        //    ->distinct()
        //     ->get();
        $record = Record::orderBy('id', 'asc')
            ->where('users_id', $request->user_id)
            ->select('id', 'numero_control')
            ->get();
        //dd($record);
        return $record;
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
        //DB::beginTransaction();
        try {

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

            $psyco = new PsychobiologicalHabits();
            $psyco->numero_comidas = $request->numero_comidas;
            $psyco->horas_descanso = $request->horas_descanso;
            $psyco->micciones_dia = $request->micciones_dia;
            $psyco->micciones_noche = $request->micciones_noche;
            $psyco->evacuaciones = $request->evacuaciones;
            $psyco->tabaco = $request->tabaco;
            $psyco->alcohol = $request->alcohol;
            $psyco->marihuana = $request->has('marihuana');
            $psyco->opiaceos = $request->has('opiaceos');
            $psyco->cocaina = $request->has('cocaina');
            $psyco->heroina = $request->has('heroina');
            $psyco->pastillas = $request->has('pastillas');
            $psyco->crack = $request->has('crack');
            $psyco->resistol = $request->has('resistol');
            $psyco->gasolina = $request->has('gasolina');
            $psyco->thiner = $request->has('thiner');
            $psyco->cristal = $request->has('cristal');
            $psyco->records_id = $record->id;
            $psyco->save();

            $weight = new WeightControl();
            $weight->fecha_visita = $carbon;
            $weight->peso = $request->peso;
            $weight->IMC = $request->IMC;
            $weight->grasa = $request->grasa;
            $weight->musculo = $request->musculo;
            $weight->KCAL = $request->KCAL;
            $weight->edad_blo = $request->edad_blo;
            $weight->visceral = $request->visceral;
            $weight->busto = $request->busto;
            $weight->cintura = $request->cintura;
            $weight->cadera = $request->cadera;
            $weight->brazo_der = $request->brazo_der;
            $weight->brazo_izq = $request->brazo_izq;
            $weight->pierna_der = $request->pierna_der;
            $weight->pierna_izq = $request->pierna_izq;
            $weight->records_id = $record->id;
            $weight->save();
            // dd($user,$record,  $psyco,$weight);
            return back()->with('success', '¡Se agrego el expediente del usuario de forma exitosa!');
            //DB::commit();

        } catch (\Throwable $th) {
            dd($th);
            // DB::rollBack();

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

        try {
            // $expediente = Record::join('users', 'records.users_id', '=', 'users.id')
            //     ->leftjoin('weight_controls', 'weight_controls.records_id', '=', 'records.id')
            //     ->join('psychobiological_habits', 'psychobiological_habits.records_id', '=', 'psychobiological_habits.id')
            //     ->orderBy('users.code_user', 'desc')
            //     ->where('records.id', $id)
            //     ->select('records.numero_control', 'records.id', 'users.name', 'users.code_user',
            //         'records.date_interview', 'users.ocupation', 'users.age', 'users.phone', 'users.email', 'users.born',
            //         'records.hipertension', 'records.asma', 'records.epilepsia', 'records.ciatica', 'records.diabetes', 'records.lumbagia', 'records.arritmia',
            //         'records.ansiedad', 'records.depresion', 'records.depre_postparto', 'records.estres_cronico', 'records.estres_postraumatico',
            //         'records.papiloma_humano', 'records.herpes', 'records.sifilis', 'records.gonorrea', 'records.sida', 'records.clamidia',
            //         'records.desmayos', 'records.mareos', 'records.perdida_conocimiento', 'records.hospitalizacion', 'records.causa', 'records.fecha_hospitalizacion',
            //         'records.alergias', 'records.cefaleas', 'records.vision_borrosa', 'records.cancer', 'records.ausencia_organos', 'records.embarazos', 'records.aborto', 'records.metodo_anticonceptivo', 'records.craneocefalico', 'records.cervicales',
            //         'records.medicamentos', 'records.numero_control', 'psychobiological_habits.numero_comidas', 'psychobiological_habits.horas_descanso', 'psychobiological_habits.micciones_dia', 'psychobiological_habits.micciones_noche',
            //         'psychobiological_habits.evacuaciones', 'psychobiological_habits.tabaco', 'psychobiological_habits.alcohol', 'psychobiological_habits.marihuana', 'psychobiological_habits.opiaceos', 'psychobiological_habits.cocaina', 'psychobiological_habits.heroina', 'psychobiological_habits.pastillas', 'psychobiological_habits.crack',
            //         'psychobiological_habits.resistol', 'psychobiological_habits.gasolina', 'psychobiological_habits.thiner', 'psychobiological_habits.cristal')

            //     ->first();
            $expediente = Record::join('users', 'records.users_id', '=', 'users.id')
                ->leftjoin('weight_controls', 'weight_controls.records_id', '=', 'records.id')
                ->join('psychobiological_habits', 'psychobiological_habits.records_id', '=', 'psychobiological_habits.id')
                ->orderBy('users.code_user', 'desc')
                ->where('records.id', $id)
                ->first();
            $peso = WeightControl::join('records', 'weight_controls.records_id', '=', 'records.id')
                ->join('users', 'records.users_id', '=', 'users.id')

                ->where('records.id', $id)
                ->distinct()
                ->get();

            $count = Record::join('users', 'records.users_id', '=', 'users.id')
                ->leftjoin('weight_controls', 'weight_controls.records_id', '=', 'records.id')
                ->join('psychobiological_habits', 'psychobiological_habits.records_id', '=', 'psychobiological_habits.id')
                ->where('records.id', $id)
                ->count();

            $pdf = PDF::loadView('records/pdf/expediente', compact('expediente', 'count', 'peso'))
                ->setPaper('A4', 'landscape');
            $pdf->output();

            /**PHP indicara que se obtiene el pdf */
            //$pdf->getDomPDF()->set_option("enable_php", true);
            $canvas = $pdf->getCanvas();
            $w = $canvas->get_width();
            $h = $canvas->get_height();
            $imageURL = 'img/logo-remo.png';
            //dd( $imageURL);
            $imgWidth = 200;
            $imgHeight = 200;
            $canvas->set_opacity(.2, "Multiply");
            $canvas->set_opacity(.2);
            $x = (($w - $imgWidth) / 2);
            $y = (($h - $imgHeight) / 2);
            $canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight);
            $explode = explode(' ', $expediente->name);

            $filename = 'expediente' . '_' . $explode[0] . '_' . $expediente->numero_control . '.pdf';
            return $pdf->stream($filename);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::join('users', 'records.users_id', '=', 'users.id')
            ->leftjoin('weight_controls', 'weight_controls.records_id', '=', 'records.id')
            ->join('psychobiological_habits', 'psychobiological_habits.records_id', '=', 'psychobiological_habits.id')
            ->orderBy('users.code_user', 'desc')

            ->where('records.id', $id)

        //->where('records.users_id','users.id')
            ->first();

        return view('records.update', compact('record'))->render();

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

        $carbon = Carbon::now();
        //DB::beginTransaction();
        try {

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
            $record->numero_control = $request->numero_control + 1;
            $record->users_id = $request->users_id;
            $record->save();

            $psyco = new PsychobiologicalHabits();
            $psyco->numero_comidas = $request->numero_comidas;
            $psyco->horas_descanso = $request->horas_descanso;
            $psyco->micciones_dia = $request->micciones_dia;
            $psyco->micciones_noche = $request->micciones_noche;
            $psyco->evacuaciones = $request->evacuaciones;
            $psyco->tabaco = $request->tabaco;
            $psyco->alcohol = $request->alcohol;
            $psyco->marihuana = $request->has('marihuana');
            $psyco->opiaceos = $request->has('opiaceos');
            $psyco->cocaina = $request->has('cocaina');
            $psyco->heroina = $request->has('heroina');
            $psyco->pastillas = $request->has('pastillas');
            $psyco->crack = $request->has('crack');
            $psyco->resistol = $request->has('resistol');
            $psyco->gasolina = $request->has('gasolina');
            $psyco->thiner = $request->has('thiner');
            $psyco->cristal = $request->has('cristal');
            $psyco->records_id = $record->id;
            $psyco->save();

            $weight = new WeightControl();
            $weight->fecha_visita = $carbon;
            $weight->peso = $request->peso;
            $weight->IMC = $request->IMC;
            $weight->grasa = $request->grasa;
            $weight->musculo = $request->musculo;
            $weight->KCAL = $request->KCAL;
            $weight->edad_blo = $request->edad_blo;
            $weight->visceral = $request->visceral;
            $weight->busto = $request->busto;
            $weight->cintura = $request->cintura;
            $weight->cadera = $request->cadera;
            $weight->brazo_der = $request->brazo_der;
            $weight->brazo_izq = $request->brazo_izq;
            $weight->pierna_der = $request->pierna_der;
            $weight->pierna_izq = $request->pierna_izq;
            $weight->records_id = $record->id;
            $weight->save();
            // dd($user,$record,  $psyco,$weight);
            return redirect()->route('record.index')->with('success', '¡Se agrego un nuevo expediente al usuario de forma exitosa!');
            //DB::commit();

        } catch (\Throwable $th) {
            dd($th);
            // DB::rollBack();

            return back()->with('error', 'Hubo un error al agregar los datos. Verifique los datos.');
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
        //
    }
}
