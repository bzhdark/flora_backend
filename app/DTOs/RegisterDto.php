<?php

namespace App\DTOs;

use Spatie\LaravelData\Data;

class RegisterDto extends Data
{
    public function __construct(public string $prenom,
                                public string $email,
                                public string $password,
                                public string $device_name)
    {

    }

    public static function rules(): array
    {
        return [
            'prenom' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'device_name' => 'required|string',
        ];
    }

    public static function messages(): array {
        return [
            "email.unique" => "Cette adresse email est déjà utilisée"
        ];
    }
}
