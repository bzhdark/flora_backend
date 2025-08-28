<?php

namespace Database\Factories;

use App\Models\RenouvellementCires;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RenouvellementCiresFactory extends Factory
{
    protected $model = RenouvellementCires::class;

    public function definition(): array
    {
        return [
            'nb_cadres' => $this->faker->randomNumber(),
            'commentaires' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
        ];
    }
}
