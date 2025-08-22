<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecoltePropolisRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
            'qte_propolis' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
