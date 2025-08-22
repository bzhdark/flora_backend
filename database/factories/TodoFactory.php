<?php

namespace Database\Factories;

use App\Models\Exploitation;
use App\Models\Ruche;
use App\Models\Rucher;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TodoFactory extends Factory
{
    protected $model = Todo::class;

    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(),
            'description' => $this->faker->text(),
            'date' => Carbon::now()->format('Y-m-d'),
            'date_notification' => now()->addDays(3),
            'notif_envoyee' => false,
            'fait' => fake()->boolean(20),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'rucher_id' => Rucher::factory(),
            'ruche_id' => Ruche::factory(),
            'exploitation_id' => Exploitation::factory(),
        ];
    }
}
