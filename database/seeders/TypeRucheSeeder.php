<?php

namespace Database\Seeders;

use App\Models\TypeRuche;
use Illuminate\Database\Seeder;

class TypeRucheSeeder extends Seeder
{
    public function run(): void
    {
        TypeRuche::factory()->create(["nom" => "Dadant 12c", "nb_cadres" => 12]);
        TypeRuche::factory()->create(["nom" => "Dadant 10c", "nb_cadres" => 12]);
        TypeRuche::factory()->create(["nom" => "Apidea", "nb_cadres" => 4]);
        TypeRuche::factory()->create(["nom" => "Miniplus", "nb_cadres" => 6]);
    }
}
