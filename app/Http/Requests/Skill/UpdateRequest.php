<?php

namespace App\Http\Requests\Skill;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'detail' => 'required|string',
            'percentage' => 'numeric|string',
            'years' => 'required|string',
            'icon' => 'nullable|string',
        ];
    }
}
