<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'bar_code' => 'required|numeric|min:5',
            'product_name' => 'required|min:2',
            'product_unit' => 'required',
            'providers_id' => 'nullable',
            'product_category' => 'required',
            'product_description' => 'nullable|min:6|max:2000',
        ];
    }
}
