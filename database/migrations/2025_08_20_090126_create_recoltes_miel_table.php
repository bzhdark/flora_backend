<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('recoltes_miel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('miellee_id')->constrained('miellees');
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->integer('nb_hausses_recoltees');
            $table->integer('qte_miel_recolte')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recoltes_miel');
    }
};
