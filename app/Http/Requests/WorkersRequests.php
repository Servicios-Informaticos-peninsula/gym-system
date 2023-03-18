<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkersRequests extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'born' => ['required', 'date'],
            'phone' => ['required', 'max:10'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8'],
            'code_user' => ['min:8'],
        ];
    }
}
