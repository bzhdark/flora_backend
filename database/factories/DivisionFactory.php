<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\Ruche;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DivisionFactory extends Factory
{
    protected $model = Division::class;

    public function definition(): array
    {
        return [
            'nb_cadres_pris' => $this->faker->randomNumber(),
            'commentaires' => $this->faker->word(),
            'reine_prise' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
            'ruche_destination_id' => Ruche::factory(),
        ];
    }
}
