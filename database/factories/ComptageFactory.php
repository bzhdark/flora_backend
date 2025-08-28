<?php

namespace Database\Factories;

use App\Models\Comptage;
use App\Models\ProduitTraitement;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ComptageFactory extends Factory
{
    protected $model = Comptage::class;

    public function definition(): array
    {
        return [
            'suit_traitement' => $this->faker->boolean(),
            'type' => $this->faker->word(),
            'nb_varroas' => $this->faker->randomNumber(),
            'duree' => $this->faker->randomNumber(),
            'poids_abeilles' => $this->faker->randomNumber(),
            'nb_abeilles' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
            'produits_traitement_id' => ProduitTraitement::factory(),
        ];
    }
}
