<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\Rucher;
use App\Models\Exploitation;
use Illuminate\Console\Command;

class CreateRuchersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ruchers:create {count=50 : Nombre de ruchers à créer}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crée un nombre spécifié de nouveaux ruchers (par défaut: 50)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $count = (int)$this->argument('count');

        if ($count <= 0) {
            $this->error('Le nombre doit être un nombre positif.');
            return 1;
        }

        // Get the first exploitation to use as reference
        $exploitation = Exploitation::first();

        if (!$exploitation) {
            $this->error("Aucune exploitation trouvée. Veuillez créer une exploitation d'abord.");
            return 1;
        }

        $this->info("Création de {$count} nouveaux ruchers pour l'exploitation: {$exploitation->nom}");

        // Create progress bar
        $progressBar = $this->output->createProgressBar($count);
        $progressBar->start();

        // Create Ruchers using factory
        $ruchers = Rucher::factory($count)->create([
            'exploitation_id' => $exploitation->id,
        ]);

        $role = Role::first();
        $role->ruchers()->attach($ruchers, ["peut_modifier" => true, "peut_lire" => true]);

        $progressBar->finish();
        $this->newLine();

        $this->info("L'opération a été terminée avec succès avec {$count} nouveaux ruchers créés !");

        return 0;
    }
}
