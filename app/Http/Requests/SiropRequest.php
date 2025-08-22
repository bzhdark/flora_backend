<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiropRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required'],
            'pourcentage_sucre' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
