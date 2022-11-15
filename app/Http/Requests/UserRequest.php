<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8', 'confirmed'],
            'phone' => ['required', 'max:10'],
            'code_user' => ['min:8'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre del cliente es obligatorio',
            //'code_user.required' => 'El campo numero de telefono es obligatorio',
            'phone.required' => 'El campo numero de telefono es obligatorio',
        ];
    }
}
