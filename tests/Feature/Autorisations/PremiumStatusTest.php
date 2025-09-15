<?php

use App\Models\Exploitation;
use App\Models\Role;
use App\Models\Ruche;
use App\Models\User;
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

    $this->role = Role::factory()->create(["exploitation_id" => $this->exploitation->id]);

    $this->user->associerExploitation($this->exploitation, $this->role);

    // Set current exploitation
    $this->user->update(["current_exploitation_id" => $this->exploitation->id]);
});

test("Un utilisateur non premium, qui a plus de 10 ruches doit être bloqué", function () {

    Ruche::factory(11)->create([
        "exploitation_id" => $this->exploitation->id,
    ]);

    expect($this->user->isBlocked())->toBeTrue();
});

test("Un utilisateur non premium, qui a moins de 10 ruches n'est pas bloqué", function () {

    Ruche::factory(10)->create([
        "exploitation_id" => $this->exploitation->id,
    ]);
    $ruches = $this->exploitation->ruches;
    info($ruches->count());

    expect($this->user->isBlocked())->toBeFalse();
});

test("Un utilisateur non premium, qui a plus de 1 exploitation est bloqué", function () {

    // Create exploitation n°2
    $exploitation2 = Exploitation::factory()->create([
        "proprietaire_id" => $this->user->id,
        "nom" => "Hexatek bis",
    ]);
    $role = Role::factory()->create(["exploitation_id" => $exploitation2->id]);
    $this->user->associerExploitation($exploitation2, $role);

    expect($this->user->isBlocked())->toBeTrue();
});
