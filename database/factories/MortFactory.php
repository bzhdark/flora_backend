<?php

namespace Database\Factories;

use App\Models\Mort;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MortFactory extends Factory
{
    protected $model = Mort::class;

    public function definition(): array
    {
        return [
            'commentaires' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'visite_id' => Visite::factory(),
        ];
    }
}
