<?php

namespace Database\Factories;

use App\Models\Exploitation;
use App\Models\Reine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReineFactory extends Factory
{
    protected $model = Reine::class;

    public function definition(): array
    {
        return [
            'reference' => $this->faker->word(),
            'annee_naissance' => $this->faker->dateTimeBetween('-5 year', 'now')->format('Y'),
            'numero_dossard' => $this->faker->word(),
            'marquee' => $this->faker->boolean(),
            'generation' => $this->faker->word(),
            'pere' => $this->faker->word(),
            'commentaires' => $this->faker->word(),
            'morte' => false,

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'exploitation_id' => Exploitation::factory(),
//            'mere_id' => Reine::factory(),
        ];
    }
}
