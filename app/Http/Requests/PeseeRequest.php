<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeseeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'poids' => ['required', 'numeric'],
            'temperature' => ['required', 'integer'],
            'hygrometrie' => ['required', 'integer'],
            'visite_id' => ['required', 'exists:visites'],
            'commentaires' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
