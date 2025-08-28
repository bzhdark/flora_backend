<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroductionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
            'reine_id' => ['nullable', 'exists:reines'],
            'souche_id' => ['nullable', 'exists:souches'],
            'mere_id' => ['nullable', 'exists:reines'],
            'generation' => ['nullable'],
            'type' => ['required'],
            'age_cellule' => ['nullable', 'integer'],
            'date_introduction' => ['required'],
            'date_ctrl_naissance' => ['nullable'],
            'date_ctrl_ponte' => ['nullable'],
            'echec' => ['boolean'],
            'terminee' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
