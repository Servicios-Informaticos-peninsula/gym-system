<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'product' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',

            'minimum_alert' => 'nullable|numeric|min:1',
            'maximun_alert'=> 'nullable|numeric|min:1',

            'purchase_price' => 'nullable|numeric|min:1',
            'sales_price' => 'nullable|numeric|min:1'
        ];
    }
}
