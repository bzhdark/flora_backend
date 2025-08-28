<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->foreignId('ruche_destination_id')->nullable()->constrained('ruches')->nullOnDelete();
            $table->foreignId('ruche_origine_id')->nullable()->constrained('ruches')->nullOnDelete();
            $table->foreignId('reine_origine_id')->nullable()->constrained('reines')->nullOnDelete();
            $table->foreignId('reine_destination_id')->nullable()->constrained('reines')->nullOnDelete();
            $table->foreignId('reine_conservee_id')->nullable()->constrained('reines')->nullOnDelete();
            $table->string('commentaires')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reunions');
    }
};
