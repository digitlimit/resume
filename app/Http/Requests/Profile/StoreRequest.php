<?php

namespace App\Http\Requests\Profile;

use App\Rules\Name;
use Digitlimit\Alert\Facades\Alert;
use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class StoreRequest extends FormRequest
{
    use FormRequestTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return ! $this->user()->profile;
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
            'photo' => 'required|image:png,jpeg',
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

    /**
     * Return a failed validation response object
     *
     * @param array $errors
     * @return RedirectResponse
     */
    protected function failedValidationResponse(array $errors): RedirectResponse
    {
        Alert::message('Please correct the errors below', 'Opps')
            ->error()
            ->details($errors)
            ->flash();

        return redirect()->route('common.profile.create');
    }
}
