<?php

namespace Database\Factories;

use App\Models\Sirop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SiropFactory extends Factory
{
    protected $model = Sirop::class;

    public function definition(): array
    {
        return [
            'nom' => fake()->word(),
            'pourcentage_sucre' => fake()->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
