<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FormRequestTrait;
use Illuminate\Validation\Rule;

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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'email',
                Rule::unique('users')->ignore($this->route('user')),
            ],
            'password' => 'required|string|min:6'
        ];
    }
}
