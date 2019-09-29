<?php namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Exceptions\AuthorizationException;
use Alert;

trait FormRequestTrait
{
    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \App\Exceptions\AuthorizationException
     */
    protected function failedAuthorization()
    {
        $response = $this->failedAuthorizationResponse();

        throw (new AuthorizationException($response))
            ->redirectTo($this->getRedirectUrl());
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        Alert::form('Some errors occurred!','Opps')
            ->error();

        $response = redirect()
            ->back()
            ->withErrors($validator);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }

    /**
     * Return failed authorization response object
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function failedAuthorizationResponse()
    {
        return redirect()->route($this->redirectRoute);
    }
}