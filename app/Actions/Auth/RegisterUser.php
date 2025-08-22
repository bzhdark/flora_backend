<?php

namespace App\Actions\Auth;

use App\Actions\TypeRuche\CreateInitialTypesRuches;
use App\DTOs\RegisterDto;
use App\Models\Exploitation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    public function __construct(public CreateInitialTypesRuches $createInitialTypesRuches){}

    /**
     * Créée l'utilisateur, une nouvelle exploitation par défaut et les types de ruches
     * @throws \Throwable
     */
    public function execute(RegisterDto $dto):User {
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
            $user->exploitations()->save($exploitation);

            // Mettre l'exploitation en current exploitation
            $user->update(["current_exploitation_id" => $exploitation->id]);

            // Créer les types de ruches
            $this->createInitialTypesRuches->execute($exploitation);

            return $user;
        });

    }
}
