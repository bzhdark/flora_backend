<?php

namespace Database\Factories;

use App\Models\PoseElement;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PoseElementFactory extends Factory
{
    protected $model = PoseElement::class;

    public function definition(): array
    {
        return [
            'grille_a_reine' => $this->faker->boolean(),
            'grille_a_propolis' => $this->faker->boolean(),
            'chasse_abeilles' => $this->faker->boolean(),
            'bonnet' => $this->faker->boolean(),
            'chaussette' => $this->faker->boolean(),
            'chaussure' => $this->faker->boolean(),
            'echarpe' => $this->faker->boolean(),
            'coussin' => $this->faker->boolean(),
            'lange' => $this->faker->boolean(),
            'lanieres' => $this->faker->boolean(),
            'trappe_a_pollen' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
        ];
    }
}
