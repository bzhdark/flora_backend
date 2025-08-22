<?php

namespace Database\Factories;

use App\Models\Miellee;
use App\Models\RecolteMiel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RecolteMielFactory extends Factory
{
    protected $model = RecolteMiel::class;

    public function definition(): array
    {
        return [
            'nb_hausses_recoltees' => $this->faker->randomNumber(),
            'qte_miel_recolte' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'miellee_id' => Miellee::factory(),
        ];
    }
}
