<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Member extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		// NOTE In a more complete implementation we'd leverage user roles here
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
            'email_address' => 'required|email',
            'status' => [
                'required',
                Rule::in(['subscribed', 'ubsubscribed', 'cleaned', 'pending'])
            ]
        ];
    }
}
