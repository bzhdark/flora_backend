<?php

namespace Database\Factories;

use App\Models\Exploitation;
use App\Models\Rucher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RucherFactory extends Factory
{
    protected $model = Rucher::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->city(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'environnement' => $this->faker->word(),
            'adresse1' => $this->faker->streetAddress(),
            'code_postal' => $this->faker->postcode(),
            'ville' => $this->faker->city(),
            'pays' => $this->faker->country(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'exploitation_id' => Exploitation::factory(),

        ];
    }
}
