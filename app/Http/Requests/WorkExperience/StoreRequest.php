<?php

namespace App\Http\Requests\WorkExperience;

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
            "job_title" => 'required|string',
            "job_description" => 'required|string',
            "start_month" => 'required|string',
            "start_year" => 'required|numeric',
            "end_month" => 'required|string',
            "end_year" => 'required|numeric',
            "company_name" => 'required|string',
            "company_info" => 'required|string',
            "company_address" => 'required|string',
            "icon" => 'required|string'
        ];
    }
}
