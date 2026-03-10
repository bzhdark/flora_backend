<?php

namespace App\Actions\TypeRuche;

use App\Models\Exploitation;

class CreateInitialTypesRuches
{
    public function execute(Exploitation $exploitation): void
    {
        $types = [
            [
                "nom" => "Dadant 12c",
                "nb_cadres" => 12,
            ],
            [
                "nom" => "Dadant 6c",
                "nb_cadres" => 6,
            ],
            [
                "nom" => "Dadant 10c",
                "nb_cadres" => 10,
            ]
        ];

        $exploitation->typesRuches()->createMany($types);
    }
}
