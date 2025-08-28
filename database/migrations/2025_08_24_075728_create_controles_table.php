<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('controles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->integer('comportement');
            $table->integer('force');
            $table->integer('reserves')->nullable();
            $table->boolean('reine_vue');
            $table->boolean('debut_de_ponte');
            $table->boolean('essaimee');
            $table->integer('males')->default(0);
            $table->boolean('reine_morte')->default(false);
            // Maladies
            $table->boolean('couvain_platre');
            $table->boolean('loque_americaine');
            $table->boolean('loque_europeenne');
            $table->boolean('nosemose');
            $table->boolean('maladie_noire');
            $table->string('autre_virus');
            // Prédateurs et ravageurs
            $table->boolean('frelon_europeen');
            $table->boolean('frelon_asiatique');
            $table->boolean('frelon_oriental');
            $table->boolean('varroas');
            $table->boolean('fausse_teigne');
            $table->boolean('aethina_tumida');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('controles');
    }
};
