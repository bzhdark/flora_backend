<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
            'comportement' => ['required', 'integer'],
            'force' => ['required', 'integer'],
            'reserves' => ['nullable', 'integer'],
            'reine_vue' => ['boolean'],
            'debut_de_ponte' => ['boolean'],
            'essaimee' => ['boolean'],
            'males' => ['required', 'integer'],
            'couvain_platre' => ['boolean'],
            'loque_americaine' => ['boolean'],
            'loque_europeenne' => ['boolean'],
            'nosemose' => ['boolean'],
            'maladie_noire' => ['boolean'],
            'autre_virus' => ['required'],
            'frelon_europeen' => ['boolean'],
            'frelon_asiatique' => ['boolean'],
            'frelon_oriental' => ['boolean'],
            'varroas' => ['boolean'],
            'fausse_teigne' => ['boolean'],
            'aethina_tumida' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
