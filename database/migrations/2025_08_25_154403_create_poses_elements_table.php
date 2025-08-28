<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('poses_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->boolean('grille_a_reine')->default(false);
            $table->boolean('grille_a_propolis')->default(false);
            $table->boolean('chasse_abeilles')->default(false);
            $table->boolean('bonnet')->default(false);
            $table->boolean('chaussette')->default(false);
            $table->boolean('chaussure')->default(false);
            $table->boolean('echarpe')->default(false);
            $table->boolean('coussin')->default(false);
            $table->boolean('lange')->default(false);
            $table->boolean('lanieres')->default(false);
            $table->boolean('trappe_a_pollen')->default(false);
            $table->foreignId('commentaires')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('poses_elements');
    }
};
