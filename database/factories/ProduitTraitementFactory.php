<?php

namespace Database\Factories;

use App\Models\ProduitTraitement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProduitTraitementFactory extends Factory
{
  protected $model = ProduitTraitement::class;

  public function definition(): array
  {
    return [
      'nom' => $this->faker->word(),
      'lanieres' => $this->faker->boolean(),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];
  }
}
