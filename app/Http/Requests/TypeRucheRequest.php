<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRucheRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', "min:1"],
            'nb_cadres' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
