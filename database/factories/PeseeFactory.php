<?php

namespace Database\Factories;

use App\Models\Pesee;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PeseeFactory extends Factory
{
    protected $model = Pesee::class;

    public function definition(): array
    {
        return [
            'poids' => $this->faker->randomFloat(3, 0, 350),
            'temperature' => $this->faker->randomNumber(),
            'hygrometrie' => $this->faker->randomNumber(),
            'commentaires' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
        ];
    }
}
