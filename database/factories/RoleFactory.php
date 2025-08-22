<?php

namespace Database\Factories;

use App\Models\Exploitation;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'peut_creer_ruches' => $this->faker->boolean(),
            'peut_creer_ruchers' => $this->faker->boolean(),
            'peut_creer_taches' => $this->faker->boolean(),
            'peut_modifier_planning' => $this->faker->boolean(),
            'peut_inviter_apiculteurs' => $this->faker->boolean(),
            'peut_modifier_exploitation' => $this->faker->boolean(),
            'peut_exporter_documents' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'exploitation_id' => Exploitation::factory(),
        ];
    }
}
