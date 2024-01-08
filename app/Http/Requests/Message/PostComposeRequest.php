<?php

namespace App\Http\Requests\Message;

use App\Rules\Name;
use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class PostComposeRequest extends FormRequest
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
        $rules = [
            'name' => ['required', new Name],
            'email' => 'required|email',
            'subject' => ['required', new Name],
            'message' => 'required|string',
        ];

        return $rules;
    }
}
