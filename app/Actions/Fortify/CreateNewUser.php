<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $messages = [
            'name.regex' => 'Tu nombre solo puede contener letras y espacios',
            'name.unique' => 'Este nombre de usuario ya ha sido escogido',
            'email.unique' => 'Este nombre de usuario ya ha sido escogido'
        ];
        
        Validator::make($input, [
            'name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[\pL\s]+$/u', 'unique:users,name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], $messages)->validate();

        return User::create([
            'name' => $input['name'],
            'slug' => Str::slug($input['name']),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ])->assignRole('Teacher');
    }
}
