<?php

namespace Database\Factories;

use App\Models\NettoyagePlancher;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class NettoyagePlancherFactory extends Factory{
    protected $model = NettoyagePlancher::class;

    public function definition(): array
    {
        return [
            'niveau_proprete' => $this->faker->randomNumber(),//
'presence_mycoses' => $this->faker->boolean(),
'presence_rongeurs' => $this->faker->boolean(),
'commentaires' => $this->faker->word(),
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),

'visite_id' => Visite::factory(),
        ];
    }
}
