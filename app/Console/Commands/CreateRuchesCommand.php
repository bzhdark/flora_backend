<?php

namespace App\Console\Commands;

use App\Models\Exploitation;
use App\Models\Role;
use App\Models\Ruche;
use App\Models\Rucher;
use App\Models\Souche;
use Illuminate\Console\Command;

class CreateRuchesCommand extends Command
{
    protected $signature = 'ruches:create';

    protected $description = "Créé 20 ruches pour l'exploitation";

    public function handle(): void
    {


        // Get the first exploitation to use as reference
        $exploitation = Exploitation::first();

        if (!$exploitation) {
            $this->error("Aucune exploitation trouvée. Veuillez créer une exploitation d'abord.");
            return;
        }

        $this->info("Création de 20 nouvelles ruches pour l'exploitation: {$exploitation->nom}");

        // Create progress bar
        $progressBar = $this->output->createProgressBar(20);
        $progressBar->start();

        $randomRuchers = $exploitation->ruchers()->inRandomOrder()->limit(2)->get();
        $progressBar->advance(5);

        if ($randomRuchers->count() < 2) {
            $this->error("Pas assez de ruchers trouvés. Veuillez créer des ruchers d'abord.");
            return;
        }

        $premierRucher = $randomRuchers[0];
        $dernierRucher = $randomRuchers[1];


        // Créer une souche
        $souche = Souche::first();
        if (!$souche) {
            $souche = Souche::factory()->create([
                "exploitation_id" => $exploitation->id,
                "nom" => "Buckfast"
            ]);
        }

        // Create Ruchers using factory
        Ruche::factory(10)->create([
            'exploitation_id' => $exploitation->id,
            'souche_id' => $souche->id,
            'rucher_id' => $premierRucher->id,
        ]);
        $progressBar->advance(12);
        Ruche::factory(10)->create([
            'exploitation_id' => $exploitation->id,
            'rucher_id' => $dernierRucher->id,
            'souche_id' => $souche->id,
        ]);

        $progressBar->finish();
        $this->newLine();

        $this->info("L'opération a été terminée avec succès avec 20 nouvelles ruches créées pour les ruchers {$dernierRucher->nom} et {$premierRucher->nom}.");

        return;
    }
}
