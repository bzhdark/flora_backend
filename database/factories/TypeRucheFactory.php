<?php

namespace Database\Factories;

use App\Models\Exploitation;
use App\Models\TypeRuche;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TypeRucheFactory extends Factory
{
    protected $model = TypeRuche::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'nb_cadres' => fake()->numberBetween(6, 12),
            'exploitation_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
