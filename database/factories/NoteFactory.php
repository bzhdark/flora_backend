<?php

namespace Database\Factories;

use App\Models\Exploitation;
use App\Models\Note;
use App\Models\Ruche;
use App\Models\Rucher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition(): array
    {
        return [
            'titre' => $this->faker->word(),
            'contenu' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'ruche_id' => Ruche::factory(),
            'rucher_id' => Rucher::factory(),
            'exploitation_id' => Exploitation::factory(),
        ];
    }
}
