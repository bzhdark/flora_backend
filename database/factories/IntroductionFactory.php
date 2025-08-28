<?php

namespace Database\Factories;

use App\Models\Introduction;
use App\Models\Reine;
use App\Models\Souche;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class IntroductionFactory extends Factory
{
    protected $model = Introduction::class;

    public function definition(): array
    {
        return [
            'generation' => $this->faker->word(),
            'type' => $this->faker->word(),
            'age_cellule' => $this->faker->randomNumber(),
            'date_introduction' => $this->faker->word(),
            'date_ctrl_naissance' => $this->faker->word(),
            'date_ctrl_ponte' => $this->faker->word(),
            'echec' => $this->faker->boolean(),
            'terminee' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
            'reine_id' => Reine::factory(),
            'souche_id' => Souche::factory(),
            'mere_id' => Reine::factory(),
        ];
    }
}
