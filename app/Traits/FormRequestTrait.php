<?php

declare(strict_types=1);

namespace App\Traits;

use App\Exceptions\AuthorizationException;
use Digitlimit\Alert\Facades\Alert;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

/**
 * @method getRedirectUrl()
 * @method redirect()
 *
 * @property  string $redirectRoute
 * @property  string $errorBag
 */
trait FormRequestTrait
{
    /**
     * Handle a failed authorization attempt.
     *
     *
     * @throws AuthorizationException
     */
    protected function failedAuthorization(): void
    {
        $response = $this->failedAuthorizationResponse();

        throw (new AuthorizationException($response))
            ->redirectTo($this->getRedirectUrl());
    }

    /**
     * Handle a failed validation attempt.
     *
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        Alert::form('Some errors occurred!', 'Opps')
            ->error();

        $response = redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }

    /**
     * Return a failed authorization response object
     */
    protected function failedAuthorizationResponse(): RedirectResponse
    {
        return redirect()->route($this->redirectRoute);
    }
}
