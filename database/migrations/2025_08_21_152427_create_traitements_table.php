<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('traitements', function (Blueprint $table) {
            $table->id();
            $table->string('notes');
            $table->string('autres_traitements');
            $table->foreignId('produit_traitement_id')->constrained('produits_traitements');
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('traitements');
    }
};
