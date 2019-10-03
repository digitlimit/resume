<?php

namespace App\Http\Requests\Summary;

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
            "title" => 'required|string',
            "icon" => 'nullable|string',
            "detail" => 'required|string'
        ];
    }
}