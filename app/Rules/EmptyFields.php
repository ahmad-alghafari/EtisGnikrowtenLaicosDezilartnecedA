<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmptyFields implements Rule
{
    public function passes($attribute, $value)
    {
        foreach ($value as $field) {
            if (!empty($field)) {
                return true;
            }
        }

        return false;
    }

    public function message()
    {
        return 'All fields are required together.';
    }
}
