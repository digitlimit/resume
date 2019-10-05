<?php

namespace App\Http\Requests\CoreValue;

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
            'title' => 'required|string',
            'detail'  => 'required|string',
            'icon'  => 'required|string',
        ];
    }
}
