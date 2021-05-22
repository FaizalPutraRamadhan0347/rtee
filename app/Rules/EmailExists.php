<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class EmailExists implements Rule
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
        // munculkan error jika email ada
        // dan statusnya bukan reject (active, pending, atau suspend)
        $user = User::where('email', $value)->where('status', '!=' , 'reject')->count();
        if ($user === 0) {
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
        return 'Email ini Sudah Terdaftar';
    }
}
