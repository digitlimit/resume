<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FormRequestTrait;

class UpdateRequest extends FormRequest
{
    use FormRequestTrait;

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
            //TODO use more strict validator for address
            'address_1' => 'nullable|string',
            'address_2' => 'nullable|string',

            'phone_number' => 'nullable|numeric',
            'mobile_number' => 'nullable|numeric',

            'email' => 'nullable|email'
        ];
    }
}