<?php

namespace App\Actions\Auth;

use App\Actions\Roles\CreateInitialRoles;
use App\Actions\TypeRuche\CreateInitialTypesRuches;
use App\DTOs\RegisterDto;
use App\Models\Exploitation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    public function __construct(
        private CreateInitialTypesRuches $createInitialTypesRuches,
        private CreateInitialRoles       $createInitialRoles
    )
    {
    }

    /**
     * Créée l'utilisateur, une nouvelle exploitation par défaut et les types de ruches
     *
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

            // Mettre l'exploitation en current exploitation
            $user->update(['current_exploitation_id' => $exploitation->id]);

            // Créer les types de ruches
            $this->createInitialTypesRuches->execute($exploitation);

            // Créer un premier rucher
            $exploitation->ruchers()->create([
                'nom' => 'Mon premier rucher',
            ]);

            // Créer les roles par défaut
            $proprietaireRole = $this->createInitialRoles->execute($exploitation->id);

            // Lier l'exploitation et le role de propriétaire à l'utilisateur
            $user->exploitations()->save($exploitation, ['role_id' => $proprietaireRole->id]);

            return $user;
        });
    }
}
