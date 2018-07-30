<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailingList extends FormRequest
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
            'name' => 'required',
            'email_type_option' => 'required|boolean',
            'permission_reminder' => 'required',
            'contact.company' => 'required',
            'contact.address1' => 'required',
            'contact.city' => 'required',
            'contact.state' => 'required',
            'contact.zip' => 'required',
            'contact.country' => 'required',
            'campaign_defaults.from_name' => 'required',
            'campaign_defaults.from_email' => 'required|email',
            'campaign_defaults.subject' => 'required',
            'campaign_defaults.language' => 'required|max:2'
        ];
    }
}
