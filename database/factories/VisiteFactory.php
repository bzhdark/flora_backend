<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ruche;
use App\Models\Visite;
use App\Models\Nourrissement;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisiteFactory extends Factory
{
    protected $model = Visite::class;

    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'nom' => $this->faker->word(),
            'ruche_id' => Ruche::factory(),
            'auteur_id' => User::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    //  public function configure()
    //  {
    //    return $this->afterCreating(function (Visite $visite) {
    //      $visite->nourrissement()->save(Nourrissement::factory()->make());
    //    });
    //  }
}
