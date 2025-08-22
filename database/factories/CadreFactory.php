<?php

namespace Database\Factories;

use App\Models\Cadre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CadreFactory extends Factory
{
    protected $model = Cadre::class;

    public function definition(): array
    {
        return [
            'position' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
