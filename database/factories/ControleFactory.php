<?php

namespace Database\Factories;

use App\Models\Controle;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ControleFactory extends Factory{
    protected $model = Controle::class;

    public function definition(): array
    {
        return [
            'comportement' => $this->faker->randomNumber(),//
'force' => $this->faker->randomNumber(),
'reserves' => $this->faker->randomNumber(),
'reine_vue' => $this->faker->boolean(),
'debut_de_ponte' => $this->faker->boolean(),
'essaimee' => $this->faker->boolean(),
'males' => $this->faker->randomNumber(),
'couvain_platre' => $this->faker->boolean(),
'loque_americaine' => $this->faker->boolean(),
'loque_europeenne' => $this->faker->boolean(),
'nosemose' => $this->faker->boolean(),
'maladie_noire' => $this->faker->boolean(),
'autre_virus' => $this->faker->word(),
'frelon_europeen' => $this->faker->boolean(),
'frelon_asiatique' => $this->faker->boolean(),
'frelon_oriental' => $this->faker->boolean(),
'varroas' => $this->faker->boolean(),
'fausse_teigne' => $this->faker->boolean(),
'aethina_tumida' => $this->faker->boolean(),
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),

'visite_id' => Visite::factory(),
        ];
    }
}
