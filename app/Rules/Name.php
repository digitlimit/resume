<?php
declare(strict_types=1);
namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Name implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z.]*)*$/i', $value)) {
            $fail(__('Invalid name'));
        }
    }
}
