<?php

namespace Database\Factories;

use App\Models\TypeCadre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TypeCadreFactory extends Factory
{
    protected $model = TypeCadre::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'est_divisible' => $this->faker->boolean(),
            'initiales' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
