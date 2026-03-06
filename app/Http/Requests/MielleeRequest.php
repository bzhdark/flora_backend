<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MielleeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required', "min:1", "max:99"],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
