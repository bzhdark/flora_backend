<?php

namespace Database\Factories;

use App\Models\Extraction;
use App\Models\Miellee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ExtractionFactory extends Factory
{
    protected $model = Extraction::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'auteur_id' => User::factory(),
            'miellee_id' => Miellee::factory(),
        ];
    }
}
