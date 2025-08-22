<?php

namespace Database\Factories;

use App\Models\Hausse;
use App\Models\HausseRecoltee;
use App\Models\RecolteMiel;
use App\Models\Ruche;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class HausseRecolteeFactory extends Factory
{
    protected $model = HausseRecoltee::class;

    public function definition(): array
    {
        return [
            'qte_miel_recolte' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'recoltes_miel_id' => RecolteMiel::factory(),
            'hausse_id' => Hausse::factory(),
            'ruche_id' => Ruche::factory(),
        ];
    }
}
