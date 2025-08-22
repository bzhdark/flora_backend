<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HausseRecolteeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'recoltes_miel_id' => ['required', 'exists:recoltes_miel'],
            'hausse_id' => ['required', 'exists:hausses'],
            'qte_miel_recolte' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
