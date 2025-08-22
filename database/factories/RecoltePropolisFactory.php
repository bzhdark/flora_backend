<?php

namespace Database\Factories;

use App\Models\RecoltePropolis;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RecoltePropolisFactory extends Factory
{
    protected $model = RecoltePropolis::class;

    public function definition(): array
    {
        return [
            'qte_propolis' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
        ];
    }
}
