<?php

use App\Models\Exploitation;
use App\Models\Role;
use App\Models\Rucher;
use App\Models\User;

beforeEach(function () {
    // Create user
    $this->user = User::factory()->create([
        'nom' => 'Alétru',
        'prenom' => 'Stéphane',
        'email' => 'stephane.aletru@gmail.com',
        'password' => bcrypt('Secret1234'),
    ]);

    // Create exploitation
    $this->exploitation = Exploitation::factory()->create([
        "proprietaire_id" => $this->user->id,
        "nom" => "Hexatek",
    ]);

    $this->role = Role::factory()->create(["exploitation_id" => $this->exploitation->id, "peut_gerer_roles" => true]);

    $this->user->exploitationRoles()->create(["exploitation_id" => $this->exploitation->id, "role_id" => $this->role->id]);

    // Set current exploitation
    $this->user->update(["current_exploitation_id" => $this->exploitation->id]);
});

describe('RoleController Store method', function () {

    test('doit avoir tous les champs requis', function () {
        $response = $this->actingAs($this->user)->postJson('/api/v1/roles', [
            "noms" => "Administrateur",
        ])->assertStatus(422);
        $response->assertJsonValidationErrors([
            'nom',
            "peut_gerer_roles",
            "acces_complet_ruchers",
            'peut_creer_ruches',
            'peut_creer_ruchers',
            'peut_creer_taches',
            'peut_modifier_planning',
            'peut_modifier_exploitation',
            'peut_inviter_apiculteurs',
            'peut_exporter_documents',
        ]);
    });

    test('doit créer le role et bien associer tous les ruchers', function () {
        $rucher1 = Rucher::factory()->create(["exploitation_id" => $this->exploitation->id, "nom" => "Rucher1"]);
        $this->actingAs($this->user)->postJson('/api/v1/roles', [
            "nom" => "Test role",
            "peut_gerer_roles" => true,
            "acces_complet_ruchers" => true,
            'peut_creer_ruches' => true,
            'peut_creer_ruchers' => true,
            'peut_creer_taches' => true,
            'peut_modifier_planning' => true,
            'peut_modifier_exploitation' => true,
            'peut_inviter_apiculteurs' => true,
            'peut_exporter_documents' => false,
            'ruchers' => [
                [
                    "rucher_id" => $rucher1->id,
                    "peut_lire" => true,
                    "peut_modifier" => false,
                ]
            ]
        ])->assertStatus(200);
        $role = Role::where("nom", "Test role")->first();
        expect($role)->toBeInstanceOf(Role::class)
            ->and($role->peut_gerer_roles)->toBeTrue()
            ->and($role->acces_complet_ruchers)->toBeTrue()
            ->and($role->peut_creer_ruches)->toBeTrue()
            ->and($role->peut_creer_ruchers)->toBeTrue()
            ->and($role->peut_creer_taches)->toBeTrue()
            ->and($role->peut_modifier_planning)->toBeTrue()
            ->and($role->peut_modifier_exploitation)->toBeTrue()
            ->and($role->peut_inviter_apiculteurs)->toBeTrue()
            ->and($role->peut_exporter_documents)->toBeFalse()
            ->and($role->ruchers)->toHaveCount(2);
    });

    test('doit créer le role et bien associer uniquement certains ruchers', function () {
        $rucher1 = Rucher::factory()->create(["exploitation_id" => $this->exploitation->id, "nom" => "Rucher1"]);
        Rucher::factory()->create(["exploitation_id" => $this->exploitation->id, "nom" => "Rucher2"]);
        $this->actingAs($this->user)->postJson('/api/v1/roles', [
            "nom" => "Test role",
            "peut_gerer_roles" => true,
            "acces_complet_ruchers" => false,
            'peut_creer_ruches' => true,
            'peut_creer_ruchers' => true,
            'peut_creer_taches' => true,
            'peut_modifier_planning' => true,
            'peut_modifier_exploitation' => true,
            'peut_inviter_apiculteurs' => true,
            'peut_exporter_documents' => false,
            'ruchers' => [
                [
                    "rucher_id" => $rucher1->id,
                    "peut_lire" => true,
                    "peut_modifier" => false,
                ]
            ]
        ])->assertStatus(200);
        $role = Role::where("nom", "Test role")->first();
        $ruchers = $role->ruchers;
        expect($role)->toBeInstanceOf(Role::class)
            ->and($role->peut_gerer_roles)->toBeTrue()
            ->and($role->acces_complet_ruchers)->toBeFalse()
            ->and($role->peut_creer_ruches)->toBeTrue()
            ->and($role->peut_creer_ruchers)->toBeTrue()
            ->and($role->peut_creer_taches)->toBeTrue()
            ->and($role->peut_modifier_planning)->toBeTrue()
            ->and($role->peut_modifier_exploitation)->toBeTrue()
            ->and($role->peut_inviter_apiculteurs)->toBeTrue()
            ->and($role->peut_exporter_documents)->toBeFalse()
            ->and($ruchers)->toHaveCount(1)
            ->and($ruchers[0]->nom)->toBe("Rucher1")
            ->and($ruchers[0]->pivot->peut_lire)->toBe(1)
            ->and($ruchers[0]->pivot->peut_modifier)->toBe(0);

    });
});
