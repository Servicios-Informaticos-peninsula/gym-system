<?php

namespace App\Http\Controllers;

use App\Models\PsychobiologicalHabits;
use App\Models\Record;

use App\Models\RecordPhoto;
use App\Models\User;
use App\Models\WeightControl;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
        $user = User::orderBy('id', 'asc')
            ->distinct()
            ->where('expediente', 0)
            ->get();

        return view('records.index', compact('user'));
    }
    public function getuser(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
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
            ->orderBy('users.code_user', 'ASC')
            ->distinct()
            ->get();

        return $list_expediente;
    }
    public function getRecord(Request $request)
    {
        $record = Record::orderBy('id', 'asc')
            ->where('users_id', $request->user_id)
            ->select('id', 'numero_control')
            ->get();

        return $record;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::orderBy('id', 'asc')
            ->distinct()
            ->where('expediente', 0)
            ->role('cliente')
            ->get();

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
            $validator = Validator::make(
                $request->all(),
                [
                    //identificacion

                    'date_interview' => 'required',
                    'ocupation' => 'required',

                    'born' => 'required',
                    'age' => 'required',
                    'name' => 'required',
                    'phone' => 'required',
                    'email' => 'required',
                    //habitos psico
                    'numero_comidas' => 'required',
                    'horas_descanso' => 'required',
                    'evacuaciones' => 'required',
                    'micciones_dia' => 'required',
                    'micciones_noche' => 'required',
                    'tabaco' => 'required',
                    'alcohol' => 'required',
                    //control peso
                    'peso' => 'required',
                    'IMC' => 'required',
                    'grasa' => 'required',
                    'musculo' => 'required',
                    'KCAL' => 'required',
                    'edad_blo' => 'required',
                    'visceral' => 'required',
                    'busto' => 'required',
                    'cintura' => 'required',
                    'cadera' => 'required',
                    'brazo_der' => 'required',
                    'brazo_izq' => 'required',
                    'pierna_der' => 'required',
                    'pierna_izq' => 'required',
                    'path' => 'required',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'max:2048',
                ],
                [
                    //identificacion

                    'date_interview.required' => 'El campo de fecha de la entrevista es obligatorio',
                    'ocupation.required' => 'El campo de ocupacion es obligatorio',

                    'born.required' => 'El campo de fecha de nacimiento es obligatorio',
                    'age.required' => 'El campo de edad es obligatorio',
                    'name.required' => 'El campo de nombre es obligatorio',
                    'phone.required' => 'El campo de telefono es obligatorio',
                    'email.required' => 'El campo de correo electronico es obligatorio',
                    //habitos psico
                    'numero_comidas.required' => 'El campo de número de comidas es obligatorio',
                    'horas_descanso.required' => 'El campo de sueño es obligatorio',
                    'evacuaciones.required' => 'El campo de evacuaciones es obligatorio',
                    'micciones_dia.required' => 'El campo de micciones al día es obligatorio',
                    'micciones_noche.required' => 'El campo de micciones al noche es obligatorio',
                    'tabaco.required' => 'El campo de tabaco es obligatorio',
                    'alcohol.required' => 'El campo de alcohol es obligatorio',
                    //control peso
                    'peso.required' => 'El campo de peso es obligatorio',
                    'IMC.required' => 'El campo de IMC es obligatorio',
                    'grasa.required' => 'El campo de Grasa es obligatorio',
                    'musculo.required' => 'El campo de musculo es obligatorio',
                    'KCAL.required' => 'El campo de KCAL es obligatorio',
                    'edad_blo.required' => 'El campo de edad blo es obligatorio',
                    'visceral.required' => 'El campo de visceral es obligatorio',
                    'busto.required' => 'El campo de busto es obligatorio',
                    'cintura.required' => 'El campo de cintura es obligatorio',
                    'cadera.required' => 'El campo de cadera es obligatorio',
                    'brazo_der.required' => 'El campo de brazo derecho es obligatorio',
                    'brazo_izq.required' => 'El campo de brazo izquierdo es obligatorio',
                    'pierna_der.required' => 'El campo de pierna derecha es obligatorio',
                    'pierna_izq.required' => 'El campo de pierna izquierda es obligatorio',
                    'path.required' => 'El campo de cargar foto es obligatorio',
                    'path.mimes:jpeg,png,jpg' => 'La imagen no es JPEG,PNG o JPG',
                    'path.max:2048' => 'La imagen excede el tamaño de 2.48 MB',
                    'path.image' => 'El archivo no es imagen',
                ],
            );
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->with('error', 'Faltan campos por llenar, favor de verificar')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $usuario = User::where('id', $request->users_id)->first();
                // dd($usuario);
                $user = User::where('id', $request->users_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'ocupation' => $request->ocupation,
                    'age' => $request->age,
                    'born' => $request->born,
                    'expediente' => 1,
                ]);

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

                // $urlImagenes = [];

                if ($request->hasFile('path')) {
                    $imagenes = $request->file('path');
                    // dd($imagenes);
                    $i = 1;

                    foreach ($imagenes as $imagen) {
                        $nombre = time() . $i . '_' . $usuario->name . '_' . $record->numero_control . '_' . $record->id . '.' . $imagen->getClientOriginalExtension();
                        //$ruta = 'app/public/imagenes/' . $usuario->name . "/".$record->numero_control."/" . $nombre;
                        $ruta = storage_path('app/public/imagenes/' . $usuario->name . '/' . $record->numero_control . '/' . $nombre);
                        $photo = new RecordPhoto();
                        $photo->path = $ruta;
                        $photo->records_id = $record->id;
                        //dd($photo,$ruta,storage_path('app/public/imagenes/' . $usuario->name . "/".$record->numero_control."/" . $nombre));
                        $photo->save();
                        $contenido_archivo = file_get_contents($imagen);
                        $route = 'imagenes/' . $usuario->name . '/' . $record->numero_control . '/' . $nombre;
                        $laravel_path = Storage::disk('public')->put($route, $contenido_archivo);
                        $i++;
                    }
                }

                return redirect()
                    ->route('record.index')
                    ->with('success', '¡Se agrego el expediente del usuario de forma exitosa!');
            }
        } catch (\Throwable $th) {
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
            $expediente = Record::join('users', 'records.users_id', '=', 'users.id')
                ->leftjoin('weight_controls', 'weight_controls.records_id', '=', 'records.id')
                ->join('psychobiological_habits', 'psychobiological_habits.records_id', '=', 'psychobiological_habits.id')
                ->orderBy('users.code_user', 'desc')
                ->where('records.id', $id)
                ->first();

            $peso = WeightControl::join('records', 'weight_controls.records_id', '=', 'records.id')
                ->join('users', 'records.users_id', '=', 'users.id')
                ->where('users.id', $expediente->users_id)
                ->first();
            $peso = WeightControl::join('records', 'weight_controls.records_id', '=', 'records.id')
                ->join('users', 'records.users_id', '=', 'users.id')
                ->where('users.id', $expediente->users_id)
                ->get();
            $count = Record::join('users', 'records.users_id', '=', 'users.id')
                ->leftjoin('weight_controls', 'weight_controls.records_id', '=', 'records.id')
                ->join('psychobiological_habits', 'psychobiological_habits.records_id', '=', 'psychobiological_habits.id')
                ->where('records.id', $id)
                ->count();

            $pdf = PDF::loadView('records/pdf/expediente', compact('expediente', 'count', 'peso'))->setPaper('A4', 'portrait');
            $pdf->output();

            $explode = explode(' ', $expediente->name);

            $filename = 'expediente' . '_' . $explode[0] . '_' . $expediente->numero_control . '.pdf';
            return $pdf->stream($filename);
        } catch (\Throwable $th) {
            echo 'No se puede visualizar el archivo';
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showImg($id)
    {
        try {
            $fotos = RecordPhoto::where('records_id', $id)->get();
            $html = ob_get_clean();
            $pdf = PDF::loadView('records/pdf/fotos', compact('fotos'))->setPaper('A4', 'portrait');
            $pdf->render();

            $pdf->output();
            //$explode = explode(' ', $expediente->name);

            //$filename = 'expediente' . '_' . $explode[0] . '_' . $expediente->numero_control . '.pdf';
            // return $pdf->stream($filename);
            return $pdf->stream('hola.pdf');
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
            ->where('records.users_id', $id)
            //->where('records.id', $id)

            ->latest('records.created_at')
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
        // DB::beginTransaction();

        // try {
        $validator = Validator::make(
            $request->all(),
            [
                //identificacion
                'path' => 'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
            [
                //identificacion

                'path.required' => 'El campo de cargar foto es obligatorio',
                'path.mimes:jpeg,png,jpg' => 'La imagen no es JPEG,PNG o JPG',
                'path.max:2048' => 'La imagen excede el tamaño de 2.48 MB',
                'path.image' => 'El archivo no es imagen',
            ],
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', 'Faltan campos por llenar, favor de verificar')
                ->withErrors($validator)
                ->withInput();
        } else {
            $usuario = User::where('id', $request->users_id)->first();
            $user = User::where('id', $request->users_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'ocupation' => $request->ocupation,
                'age' => $request->age,
                'born' => $request->born,
            ]);

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

            if ($request->hasFile('path')) {
                $imagenes = $request->file('path');
                $i = 1;
                // dd($imagenes);
                foreach ($imagenes as $imagen) {
                    // dd($imagen);

                    $nombre = time() . $i . '_' . $usuario->name . '_' . $record->numero_control . '_' . $record->id . '.' . $imagen->getClientOriginalExtension();
                    //$ruta = 'app/public/imagenes/' . $usuario->name . "/".$record->numero_control."/" . $nombre;
                    $ruta = storage_path('app/public/imagenes/' . $usuario->name . '/' . $record->numero_control . '/' . $nombre);
                    //   dd($ruta);
                    $photo = new RecordPhoto();
                    $photo->path = $ruta;
                    $photo->records_id = $record->id;
                    //dd($photo,$ruta,storage_path('app/public/imagenes/' . $usuario->name . "/".$record->numero_control."/" . $nombre));
                    $photo->save();
                    // dd($photo);
                    $contenido_archivo = file_get_contents($imagen);
                    $route = 'imagenes/' . $usuario->name . '/' . $record->numero_control . '/' . $nombre;
                    $laravel_path = Storage::disk('public')->put($route, $contenido_archivo);
                    $i++;
                }
            }
            // dd($user,$record,  $psyco,$weight);
            return redirect()
                ->route('record.index')
                ->with('success', '¡Se agrego un nuevo expediente al usuario de forma exitosa!');
        }

        // DB::commit();

        /*} catch (\Throwable $th) {
            //dd($th);
            DB::rollBack();

            return back()->with('error', 'Hubo un error al agregar los datos. Verifique los datos.');
        }*/
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
