<?php

namespace App\Rules\System;

use Illuminate\Contracts\Validation\Rule;

class validMobileNumberRule implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // $value = preg_replace("/[^a-zA-Z0-9\s]/", "", $value);
        
        // if (in_array(strlen($value),[6,7,9,10,13])) {
        if (strlen($value) >= 6 && strlen($value) <= 13) {

            return true;
        } else {
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
        return 'Please enter valid contact number.';
    }
}
