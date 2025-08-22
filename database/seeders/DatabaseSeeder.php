<?php

namespace Database\Seeders;

use App\Models\Mort;
use App\Models\Role;
use App\Models\User;
use App\Models\Ruche;
use App\Models\Sirop;
use App\Models\Rucher;
use App\Models\Visite;
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
        TypeRuche::factory()->create(["nom" => "Dadant 12c"]);
        ProduitTraitement::factory(5)->create();
        $superadmin = User::factory()->create([
            'nom' => 'Alétru',
            'prenom' => 'Stéphane',
            'email' => 'stephane.aletru@gmail.com',
            'password' => bcrypt('Secret1234'),
        ]);
        $exploitation = Exploitation::factory()->hasApiculteurs(2)->hasSirops(2)->create([
            "proprietaire_id" => $superadmin->id,
            "nom" => "Hexatek",
        ]);
        $superadmin->update(["current_exploitation_id" => $exploitation->id]);

        $roles = Role::factory(2)->create(["exploitation_id" => $exploitation->id]);
        $role = $roles->first();
        $superadmin->roles()->attach($role);


        $ruchers = Rucher::factory(3)->hasRuches(5, [
            'exploitation_id' => $exploitation->id,
            "type_ruche_id" => TypeRuche::first()->id
        ])->create(["exploitation_id" => $exploitation->id]);


        $role->ruchers()->attach($ruchers, ["peut_modifier" => true, "peut_lire" => true]);

        $ruches = Ruche::all();
        $sirop = Sirop::first();
        // Créer des visites pour chaque ruche
        foreach ($ruches as $ruche) {
            Visite::factory()->hasMort()->hasPesee()->create(['ruche_id' => $ruche->id, 'exploitation_id' => $exploitation->id]);
            Visite::factory()->hasNourrissement(["sirop_id" => $sirop->id])->create(['ruche_id' => $ruche->id, 'exploitation_id' => $exploitation->id]);
        }
    }
}
