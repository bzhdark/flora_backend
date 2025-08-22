<?php

namespace Database\Factories;

use App\Models\RecoltePollen;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RecoltePollenFactory extends Factory
{
    protected $model = RecoltePollen::class;

    public function definition(): array
    {
        return [
            'qte_pollen' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
        ];
    }
}
