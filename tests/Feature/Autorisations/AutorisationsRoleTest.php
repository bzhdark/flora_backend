<?php

use App\Models\Exploitation;
use App\Models\Role;
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

    $this->role = Role::factory()->create([
        "exploitation_id" => $this->exploitation->id,
        "peut_gerer_roles" => false
    ]);

    $this->user->exploitationRoles()->create(["exploitation_id" => $this->exploitation->id, "role_id" => $this->role->id]);

    // Set current exploitation
    $this->user->update(["current_exploitation_id" => $this->exploitation->id]);
});

test('Un utilisateur non autorisé ne peut pas créer un role', function () {
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
    ])->assertStatus(403);
});

test('Un utilisateur non autorisé ne peut pas modifier un role', function () {
    $this->actingAs($this->user)->putJson('/api/v1/roles/' . $this->role->id, [
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
    ])->assertStatus(403);
});

test('Un utilisateur non autorisé ne peut pas supprimer un role', function () {
    $this->actingAs($this->user)->deleteJson('/api/v1/roles/' . $this->role->id)->assertStatus(403);
});
