<?php

namespace App\Http\Requests\Profile;

use Digitlimit\Alert\Facades\Alert;
use App\Rules\Name;
use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

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
        //return true if profile exists
        return $this->user()->profile;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', new Name],
            'job_title' => ['required', new Name],
            'first_name' => ['required', new Name],
            'last_name' => ['required', new Name],
            'other_names' => ['required', new Name],
            'photo' => 'nullable|image:png,jpeg',
        ];
    }

    /**
     * Return a failed authorization response object
     *
     * @return RedirectResponse
     */
    protected function failedAuthorizationResponse(): RedirectResponse
    {
        Alert::message('Unauthorized Access', 'Opps')
            ->error();

        return redirect()->route('common.profile.edit');
    }
}
