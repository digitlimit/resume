<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FormRequestTrait;
use Alert;

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
        return !$this->user()->profile;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => 'required|name',
            "job_title" => 'required|name',
            "first_name" => 'required|name',
            "last_name" => 'required|name',
            "other_names" => 'nullable|name'
        ];
    }

    /**
     * Return failed authorization response object
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function failedAuthorizationResponse()
    {
        Alert::form('Unauthorized Access','Opps')
            ->error();

        return redirect()->route('common.profile.edit');
    }
}
