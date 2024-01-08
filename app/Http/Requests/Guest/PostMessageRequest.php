<?php

namespace App\Http\Requests\Guest;

use App\Rules\Recaptcha;
use App\Rules\Name;
use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class PostMessageRequest extends FormRequest
{
    use FormRequestTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', new Name],
            'email' => 'required|email',
            'subject' => ['required', new Name],
            'message' => 'required|string',
            config('captcha.v2.field') => ['required', new Recaptcha],
        ];
    }

    public function messages()
    {
        $captcha = config('captcha.v2.field');

        return [
            "$captcha.required" => 'Please verify you are human',
        ];
    }
}
