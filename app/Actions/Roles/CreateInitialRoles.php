<?php

namespace App\Actions\Roles;

use App\Models\Role;
use App\Models\Rucher;

class CreateInitialRoles
{
    public function execute(int $exploitationId): Role
    {
        // Créer un role par défaut
        $proprietaireRole = Role::create([
            'nom' => 'Propriétaire',
            'acces_complet_ruchers' => true,
            'peut_creer_ruchers' => true,
            'exploitation_id' => $exploitationId,
            'peut_creer_taches' => true,
            'peut_creer_ruches' => true,
            'peut_exporter_documents' => true,
            'peut_inviter_apiculteurs' => true,
            'peut_modifier_exploitation' => true,
            'peut_modifier_planning' => true,
            'is_proprietaire' => true,
        ]);

        // Créer un role apuculteur
        $apiculteurRole = Role::create([
            'nom' => 'Apiculteur',
            'acces_complet_ruchers' => true,
            'peut_creer_ruchers' => true,
            'exploitation_id' => $exploitationId,
            'peut_creer_taches' => true,
            'peut_creer_ruches' => true,
            'peut_exporter_documents' => true,
            'peut_inviter_apiculteurs' => true,
            'peut_modifier_exploitation' => true,
            'peut_modifier_planning' => true,
            'is_proprietaire' => false,
        ]);

        // Associer les roles au rucher
        $rucher = Rucher::where('exploitation_id', $exploitationId)->first();
        if ($rucher) {
            $proprietaireRole->ruchers()->save($rucher, ['peut_lire' => true, 'peut_modifier' => true]);
            $apiculteurRole->ruchers()->save($rucher, ['peut_lire' => true, 'peut_modifier' => true]);
        }

        return $proprietaireRole;
    }
}
