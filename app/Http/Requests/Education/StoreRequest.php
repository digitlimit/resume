<?php

namespace App\Http\Requests\Education;

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
            "degree" => 'required|string',
            "gpa" => 'required|string',
            "start_month" => 'required|string',
            "start_year" => 'required|numeric',
            "end_month" => 'required|string',
            "end_year" => 'required|numeric',
            "school_name" => 'required|string',
            "school_info" => 'required|string',
            "school_address" => 'required|string',
            "icon" => 'nullable|string'
        ];
    }
}
