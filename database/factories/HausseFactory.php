<?php

namespace Database\Factories;

use App\Models\Hausse;
use App\Models\Ruche;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class HausseFactory extends Factory
{
    protected $model = Hausse::class;

    public function definition(): array
    {
        return [
            'reference' => $this->faker->word(),
            'taux_remplissage' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'ruche_id' => Ruche::factory(),
        ];
    }
}
