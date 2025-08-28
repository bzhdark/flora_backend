<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoseElementRequest extends FormRequest{
    public function rules(): array
    {
        return [
            'visite_id' => ['required', 'exists:visites'],
'grille_a_reine' => ['boolean'],
'grille_a_propolis' => ['boolean'],
'chasse_abeilles' => ['boolean'],
'bonnet' => ['boolean'],
'chaussette' => ['boolean'],
'chaussure' => ['boolean'],
'echarpe' => ['boolean'],
'coussin' => ['boolean'],
'lange' => ['boolean'],
'lanieres' => ['boolean'],
'trappe_a_pollen' => ['boolean'],//
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
