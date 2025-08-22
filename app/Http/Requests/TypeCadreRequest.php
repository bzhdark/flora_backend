<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeCadreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required'],
            'est_divisible' => ['boolean'],
            'initiales' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
