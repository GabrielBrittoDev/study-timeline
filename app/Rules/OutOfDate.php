<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OutOfDate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $date = new \DateTime($value);
            $today =  new \DateTime('today');
            $days = date_diff($date, $today)->days;

            return $days < 5 && $date <= $today;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A :attribute precisa ser hoje ou no maximo 5 dias anterior a esse.';
    }
}
