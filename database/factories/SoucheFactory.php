<?php

namespace Database\Factories;

use App\Models\Exploitation;
use App\Models\Souche;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SoucheFactory extends Factory{
    protected $model = Souche::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),//
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),

'exploitation_id' => Exploitation::factory(),
        ];
    }
}
