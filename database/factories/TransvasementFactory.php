<?php

namespace Database\Factories;

use App\Models\Ruche;
use App\Models\Transvasement;
use App\Models\Visite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TransvasementFactory extends Factory{
    protected $model = Transvasement::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),//
'updated_at' => Carbon::now(),

'visite_id' => Visite::factory(),
'ruche_destination_id' => Ruche::factory(),
'ruche_origine_id' => Ruche::factory(),
        ];
    }
}
