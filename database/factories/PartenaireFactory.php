<?php

namespace Database\Factories;

use App\Models\Exploitation;
use App\Models\Partenaire;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PartenaireFactory extends Factory
{
    protected $model = Partenaire::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'code' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'exploitation_id' => Exploitation::factory(),
        ];
    }
}
