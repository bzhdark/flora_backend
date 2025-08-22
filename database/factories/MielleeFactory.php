<?php

namespace Database\Factories;

use App\Models\Miellee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MielleeFactory extends Factory
{
    protected $model = Miellee::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
