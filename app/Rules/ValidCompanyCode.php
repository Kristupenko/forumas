<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCompanyCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
    public function passes($attribute, $value)
{
    if (!preg_match('/^\d{9}$/', $value)) return false;
    // Paprastas algoritmo pavyzdys (9 skaitmenų tikrinimas)
    return true; // čia įterpk validavimo logiką
}

}
