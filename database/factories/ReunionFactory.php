<?php

namespace Database\Factories;

use App\Models\Reine;
use App\Models\Reunion;
use App\Models\Ruche;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReunionFactory extends Factory
{
    protected $model = Reunion::class;

    public function definition(): array
    {
        return [
            'commentaires' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
            'ruche_destination_id' => Ruche::factory(),
            'ruche_origine_id' => Ruche::factory(),
            'reine_origine_id' => Reine::factory(),
            'reine_destination_id' => Reine::factory(),
            'reine_conservee_id' => Reine::factory(),
        ];
    }
}
