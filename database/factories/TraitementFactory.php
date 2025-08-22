<?php

namespace Database\Factories;

use App\Models\ProduitTraitement;
use App\Models\Traitement;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TraitementFactory extends Factory
{
    protected $model = Traitement::class;

    public function definition(): array
    {
        return [
            'notes' => $this->faker->sentence(),
            'autres_traitements' => $this->faker->sentence(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'produit_traitement_id' => ProduitTraitement::factory(),
            "visite_id" => Visite::factory(),
        ];
    }
}
