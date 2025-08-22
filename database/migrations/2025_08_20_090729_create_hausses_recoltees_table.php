<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hausses_recoltees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recoltes_miel_id')->constrained('recoltes_miel');
            $table->foreignId('hausse_id')->constrained('hausses')->cascadeOnDelete();
            $table->foreignId('ruche_id')->constrained('ruches')->cascadeOnDelete();
            $table->foreignId('extraction_id')->nullable()->constrained('extractions')->nullOnDelete();
            $table->foreignId('exploitation_id')->constrained('exploitations')->cascadeOnDelete();
            $table->integer('qte_miel_recolte');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hausses_recoltees');
    }
};
