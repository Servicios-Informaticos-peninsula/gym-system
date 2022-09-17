<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipRequest extends FormRequest
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
            'users_id' => ['required', 'exists:users,id'],
            'membership_type' => ['required', 'exists:membership_types,id'],
            'init_date' => ['required', 'date'],
            'expiration_date' => ['required', 'date']
        ];
    }
}
