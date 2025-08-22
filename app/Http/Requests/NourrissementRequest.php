<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NourrissementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'qte_sirop' => ['required', 'integer'],
            'qte_candi' => ['required', 'integer'],
            'qte_pate_proteinee' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
