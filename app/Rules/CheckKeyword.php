<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Key_words;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class CheckKeyword implements Rule
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
        $key =  Key_words::pluck('name');
        return !Str::containsAll($value, [$key]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Dính từ khóa rồi!!";
    }
}
