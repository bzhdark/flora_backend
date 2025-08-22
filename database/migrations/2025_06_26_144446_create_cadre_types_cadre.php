<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cadre_types_cadre', function (Blueprint $table) {
            $table->foreignId('cadre_id')->constrained('cadres')->cascadeOnDelete();
            $table->foreignId('type_cadre_id')->constrained('types_cadres')->cascadeOnDelete();
            $table->integer("pourcentage");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cadre_types_cadre');
    }
};
