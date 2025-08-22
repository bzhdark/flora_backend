<?php

namespace Database\Factories;

use App\Models\PoseHausses;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PoseHaussesFactory extends Factory
{
    protected $model = PoseHausses::class;

    public function definition(): array
    {
        return [
            'nb_hausses_posees' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
        ];
    }
}
