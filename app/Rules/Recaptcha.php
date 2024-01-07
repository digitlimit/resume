<?php

namespace App\Rules;

use Closure;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Validation\ValidationRule;
use GuzzleHttp\Client;
use Illuminate\Translation\PotentiallyTranslatedString;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     * @throws GuzzleException
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $client = new Client([
            'base_uri' => config('captcha.v2.api')
        ]);

        try {
            $response = $client->post('siteverify', [
                'query' => [
                    'secret' => config('captcha.v2.secret'),
                    'response' => $value
                ]
            ]);

            $success = json_decode($response->getBody())?->success;

            if (! $success) {
                $fail(__('The recaptcha verification failed. Try again.'));
            }
        } catch (\Exception $e) {
            $fail(__('The recaptcha verification failed. Try again.'));
        }
    }
}
