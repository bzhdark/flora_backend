<?php

use App\Models\Exploitation;
use App\Models\User;
use App\Models\Rucher;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

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

  $this->user->exploitations()->attach($this->exploitation->id);

  // Set current exploitation
  $this->user->update(["current_exploitation_id" => $this->exploitation->id]);
});

test('un apiculteur peut modifier un rucher restreint', function () {
  // Create rucher
  $rucher = Rucher::factory()->create([
    'exploitation_id' => $this->exploitation->id,
    "acces_complet" => false,
  ]);
  // Create role
  $role = Role::factory()->create([
    'exploitation_id' => $this->exploitation->id
  ]);
  // Attach role to rucher with permissions
  $role->ruchers()->attach($rucher->id, ["peut_modifier" => true, "peut_lire" => true]);
  // Attach role to user
  $this->user->roles()->attach($role);
  // Test the authorization
  expect($this->user->canEditRucher($rucher))->toBeTrue();
});

test('un apiculteur ne peut pas modifier un rucher qui lui est interdit', function () {
  // Create rucher
  $rucher = Rucher::factory()->create([
    'exploitation_id' => $this->exploitation->id,
    "acces_complet" => false,
  ]);
  $user2 = User::factory()->create();
  $this->exploitation->update(["proprietaire_id" => $user2->id]);
  // Create role
  $role = Role::factory()->create([
    'exploitation_id' => $this->exploitation->id
  ]);
  // Attach role to rucher with permissions
  $role->ruchers()->attach($rucher->id, ["peut_modifier" => false, "peut_lire" => false]);
  // Attach role to user
  $this->user->roles()->attach($role);
  // Test the authorization
  expect($this->user->canEditRucher($rucher))->toBeFalse();
});

test('un apiculteur peut modifier un rucher en accès libre même si les roles sont mal configurés', function () {
  // Create rucher
  $rucher = Rucher::factory()->create([
    'exploitation_id' => $this->exploitation->id,
    "acces_complet" => true,
  ]);
  // Create role
  $role = Role::factory()->create([
    'exploitation_id' => $this->exploitation->id
  ]);
  // Attach role to rucher with permissions
  $role->ruchers()->attach($rucher->id, ["peut_modifier" => false, "peut_lire" => false]);
  // Attach role to user
  $this->user->roles()->attach($role);
  // Test the authorization
  expect($this->user->canEditRucher($rucher))->toBeTrue();
});

test('un apiculteur peut modifier un rucher en accès libre', function () {
  // Create rucher
  $rucher = Rucher::factory()->create([
    'exploitation_id' => $this->exploitation->id,
    "acces_complet" => true,
  ]);
  // Test the authorization
  expect($this->user->canEditRucher($rucher))->toBeTrue();
});

test("un apiculteur ne peut pas modifier un rucher d'une exploitation dont il ne fait pas partie", function () {
  $this->user->exploitations()->detach($this->exploitation->id);
  $user2 = User::factory()->create();
  $this->exploitation->update(["proprietaire_id" => $user2->id]);
  // Create rucher
  $rucher = Rucher::factory()->create([
    'exploitation_id' => $this->exploitation->id,
    "acces_complet" => true,
  ]);
  expect($this->user->canEditRucher($rucher))->toBeFalse();
});
