<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Reine;
use App\Models\Ruche;
use App\Models\Sirop;
use App\Models\Rucher;
use App\Models\Visite;
use App\Models\Miellee;
use App\Models\TypeRuche;
use App\Models\Exploitation;
use Illuminate\Database\Seeder;
use App\Models\ProduitTraitement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer les types de ruches
        $this->call(TypeRucheSeeder::class);

        // Créer les produits de traitement
        ProduitTraitement::factory(5)->create();

        // Création du superadmin et de son exploitation
        $superadmin = User::factory()->create([
            'nom' => 'Alétru',
            'prenom' => 'Stéphane',
            'email' => 'stephane.aletru@gmail.com',
            'password' => bcrypt('Secret1234'),
        ]);
        $exploitation = Exploitation::factory()->hasSirops(2)->create([
            "proprietaire_id" => $superadmin->id,
            "nom" => "Hexatek",
        ]);
        $superadmin->update(["current_exploitation_id" => $exploitation->id]);

        // Création des roles
        $roles = Role::factory(14)->create(["exploitation_id" => $exploitation->id]);
        $role = $roles->first();
        $role->update([
            "peut_gerer_roles" => true,
            "nom" => "Propriétaire",
            "peut_creer_ruches" => true,
            "peut_creer_taches" => true,
            "peut_modifier_exploitation" => true,
            "acces_complet_ruchers" => true,
            "peut_modifier_planning" => true,
            "peut_inviter_apiculteurs" => true,
            "peut_creer_ruchers" => true,
            "peut_exporter_documents" => true,
            "is_proprietaire" => true,
        ]);
        $superadmin->exploitationRoles()->create([
            "exploitation_id" => $exploitation->id,
            "role_id" => $role->id,
        ]);

        // Créer des miellées
        Miellee::factory(3)->create(["exploitation_id" => $exploitation->id]);

        // Création des ruchers
        $typeRuche1 = TypeRuche::find(1);
        $typeRuche2 = TypeRuche::find(2);
        $ruchers = Rucher::factory(3)->hasRuches(15, [
            'exploitation_id' => $exploitation->id,
            "type_ruche_id" => fake()->boolean(50) ? $typeRuche1->id : $typeRuche2->id,
        ])->create(["exploitation_id" => $exploitation->id]);
        $autresRuchers = Rucher::factory(10)->create(["exploitation_id" => $exploitation->id]);
        $role->ruchers()->attach($ruchers, ["peut_modifier" => true, "peut_lire" => true]);
        $role->ruchers()->attach($autresRuchers, ["peut_modifier" => true, "peut_lire" => true]);

        // Créer des visites
        $ruches = Ruche::all();
        $sirop = Sirop::first();
        // Créer des visites pour chaque ruche
        foreach ($ruches as $ruche) {
            Visite::factory()->hasMort()->hasPesee()->create(
                ['ruche_id' => $ruche->id, 'exploitation_id' => $exploitation->id]
            );
            Visite::factory()->hasNourrissement(["sirop_id" => $sirop->id])->create(
                ['ruche_id' => $ruche->id, 'exploitation_id' => $exploitation->id]
            );

            $reine = Reine::factory()->create(["exploitation_id" => $exploitation->id]);
            $ruche->update(["reine_id" => $reine->id]);
        }
    }
}
