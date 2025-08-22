<?php

namespace Database\Factories;

use App\Models\RecolteGeleeRoyale;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RecolteGeleeRoyaleFactory extends Factory
{
    protected $model = RecolteGeleeRoyale::class;

    public function definition(): array
    {
        return [
            'qte_gelee_royale' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
        ];
    }
}
