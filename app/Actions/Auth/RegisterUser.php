<?php

namespace App\Actions\Auth;

use App\Actions\TypeRuche\CreateInitialTypesRuches;
use App\DTOs\RegisterDto;
use App\Models\Exploitation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    public function __construct(private CreateInitialTypesRuches $createInitialTypesRuches)
    {
    }

    /**
     * Créée l'utilisateur, une nouvelle exploitation par défaut et les types de ruches
     * @throws \Throwable
     */
    public function execute(RegisterDto $dto): User
    {
        return DB::transaction(function () use ($dto) {
            // créer l'utilisateur
            $user = User::create([
                'prenom' => $dto->prenom,
                'email' => $dto->email,
                'password' => Hash::make($dto->password),
            ]);

            // Créer et associer l'exploitation
            $exploitation = Exploitation::create([
                'nom' => 'Exploitation de ' . $dto->prenom,
                'proprietaire_id' => $user->id,
            ]);

            // Créer un role par défaut
            $role = Role::create([
                "nom" => "Propriétaire",
                "acces_complet_ruchers" => true,
                "peut_creer_ruchers" => true,
                "exploitation_id" => $exploitation->id,
                "peut_creer_taches" => true,
                "peut_creer_ruches" => true,
                "peut_exporter_documents" => true,
                "peut_inviter_apiculteurs" => true,
                "peut_modifier_exploitation" => true,
                "peut_modifier_planning" => true,
                "is_proprietaire" => true,
            ]);

            // Lier l'exploitation et le role à l'utilisateur
            $user->exploitations()->save($exploitation, ["role_id" => $role->id]);

            // Mettre l'exploitation en current exploitation
            $user->update(["current_exploitation_id" => $exploitation->id]);

            // Créer les types de ruches
            $this->createInitialTypesRuches->execute($exploitation);

            // Créer un premier rucher
            $rucher = $exploitation->ruchers()->create([
                "nom" => "Mon premier rucher",
            ]);

            // Associer le role au rucher
            $role->ruchers()->save($rucher, ["peut_lire" => true, "peut_modifier" => true]);

            return $user;
        });
    }
}
