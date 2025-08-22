<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecolteGeleeRoyaleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
            'qte_gelee_royale' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
