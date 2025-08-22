<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesees', function (Blueprint $table) {
            $table->id();
            $table->decimal('poids', 8, 3);
            $table->integer('temperature')->nullable();
            $table->integer('hygrometrie')->nullable();
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->string('commentaires')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesees');
    }
};
