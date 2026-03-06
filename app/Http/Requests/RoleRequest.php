<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "nom" => "required|string|max:150|min:1",
            // Accès
            "acces_complet_ruchers" => ['boolean', "required"],
            // Création
            'peut_creer_ruches' => ['boolean', "required"],
            'peut_creer_ruchers' => ['boolean', "required"],
            'peut_creer_taches' => ['boolean', "required"],
            // Modification
            'peut_modifier_planning' => ['boolean', "required"],
            'peut_modifier_exploitation' => ['boolean', "required"],
            // Utilisateurs
            'peut_inviter_apiculteurs' => ['boolean', "required"],
            'peut_gerer_roles' => ['boolean', "required"],
            // Exports
            'peut_exporter_documents' => ['boolean', "required"],
            // Ruchers
            "ruchers" => ['array'],
            "ruchers.peut_lire" => ['boolean'],
            "ruchers.peut_modifier" => ['boolean'],
            "ruchers.rucher_id" => ['integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
