<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comptages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->boolean('suit_traitement');
            $table->string('type');
            $table->integer('nb_varroas')->nullable();
            $table->integer('duree')->nullable();
            $table->integer('poids_abeilles')->nullable();
            $table->foreignId('produits_traitement_id')->nullable();
            $table->integer('nb_abeilles')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comptages');
    }
};
