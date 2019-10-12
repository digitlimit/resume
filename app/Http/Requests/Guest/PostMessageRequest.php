<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FormRequestTrait;
use App\Rules\Recaptcha;
use Alert;

class PostMessageRequest extends FormRequest
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
            'name' => 'required|name',
            'email' => 'required|email',
            'subject' => 'required|name',
            'message' => 'required|string',
            config('captcha.v2.field') => ['required', new Recaptcha]
        ];
    }

    public function messages()
    {
        $captcha = config('captcha.v2.field');
        return [
            "$captcha.required" => 'Please verify you are human'
        ];
    }
}
