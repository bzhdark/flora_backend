<?php

namespace Database\Factories;

use App\Models\Nourrissement;
use App\Models\Sirop;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class NourrissementFactory extends Factory
{
    protected $model = Nourrissement::class;

    public function definition(): array
    {
        return [
            'qte_sirop' => $this->faker->randomNumber(),
            'qte_candi' => $this->faker->randomNumber(),
            'qte_miel' => $this->faker->randomNumber(),
            'qte_pate_proteinee' => $this->faker->randomNumber(),
            "visite_id" => Visite::factory(),
            "sirop_id" => Sirop::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
