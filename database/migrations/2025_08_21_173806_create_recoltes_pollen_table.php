<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('recoltes_pollen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->integer('qte_pollen');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recoltes_pollen');
    }
};
