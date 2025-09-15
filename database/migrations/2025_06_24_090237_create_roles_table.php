<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('roles', function (Blueprint $table) {
      $table->id();
      $table->string('nom');
      $table->boolean('is_proprietaire')->default(false);
      $table->boolean('acces_complet_ruchers')->default(true);
      $table->foreignId('exploitation_id')->constrained('exploitations')->cascadeOnDelete();
      $table->boolean('peut_creer_ruches');
      $table->boolean('peut_creer_ruchers');
      $table->boolean('peut_creer_taches');
      $table->boolean('peut_modifier_planning');
      $table->boolean('peut_inviter_apiculteurs');
      $table->boolean('peut_modifier_exploitation');
      $table->boolean('peut_exporter_documents');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('roles');
  }
};
