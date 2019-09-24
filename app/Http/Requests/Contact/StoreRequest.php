<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FormRequestTrait;

class StoreRequest extends FormRequest
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
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',

            'phone_number' => 'required|numeric',
            'mobile_number' => 'required|numeric',

            'email' => 'required|email'
        ];
    }
}