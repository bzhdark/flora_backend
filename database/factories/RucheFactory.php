<?php

namespace Database\Factories;

use App\Models\Exploitation;
use App\Models\Visite;
use App\Models\Ruche;
use App\Models\Rucher;
use App\Models\TypeRuche;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RucheFactory extends Factory
{
  protected $model = Ruche::class;

  public function definition(): array
  {
    return [
      'reference' => $this->faker->firstNameFemale(),
      'note' => $this->faker->randomNumber(),
      'qr_code' => $this->faker->uuid(),
      'gestion_rbc' => $this->faker->boolean(15),
      'archivee' => $this->faker->boolean(80),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
      'rucher_id' => Rucher::factory(),
      'exploitation_id' => Exploitation::factory(),
      "type_ruche_id" => TypeRuche::factory(),

    ];
  }

//  public function configure()
//  {
//    return $this->afterCreating(function (Ruche $ruche) {
//      // Create 5 Visite for each Ruche
//      $ruche->visites()->saveMany(Visite::factory()->hasNourrissement()->count(5)->make());
//    });
//  }
}
