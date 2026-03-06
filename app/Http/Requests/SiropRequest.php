<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiropRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required', "min:1"],
            'pourcentage_sucre' => ['required', 'numeric', 'min:1', 'max:100'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
