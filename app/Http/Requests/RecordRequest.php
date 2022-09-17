<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
            'path' => 'required|image:jpeg,png,jpg|max:2048',

        ];
    }
    public function messages()
    {
        return [
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
            'path.image:jpeg,png,jpg' => 'La imagen no es JPEG,PNG o JPG',
            'path.max:2048' => 'La imagen excede el tamaño de 2.48 MB',

        ];
    }
    public function attributes()
    {
        return [
            //identificacion
            'date_interview' => 'Fecha Entrevista',
            'ocupation' => 'Ocupacion',

            'born' => 'Fecha de Nacimiento',
            'age' => 'Edad',
            'name' => 'Nombre',
            'phone' => 'Telefono',
            'email' => 'Correo Electronico',
            //habitos psico
            'numero_comidas' => 'Alimentacion (Número de Comidas)',
            'horas_descanso' => 'Sueño (Horas Habituales de Descanso)',
            'evacuaciones' => 'Evacuaciones (Defecar): Veces durante el día',
            'micciones_dia' => 'Micciones (Orinar) Veces al día',
            'micciones_noche' => 'Micciones (Orinar) Veces en la noche',
            'tabaco' => 'Tabaco (Consumo diario)',
            'alcohol' => 'Alcohol (Consumo diario)',
            //control peso
            'peso' => 'Peso',
            'IMC' => 'IMC',
            'grasa' => 'Grasa',
            'musculo' => 'Musculo',
            'KCAL' => 'KCAL',
            'edad_blo' => 'Edad Blo',
            'visceral' => 'Visceral',
            'busto' => 'Busto',
            'cintura' => 'Cintura',
            'cadera' => 'Cadera',
            'brazo_der' => 'Brazo Derecho',
            'brazo_izq' => 'Brazo Izquierdo',
            'pierna_der' => 'Pierna Derecha',
            'pierna_izq' => 'Pierna Izquierda',
            'path' => 'Cargar Foto',

        ];
    }
}
