<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ruches', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->boolean('vide')->default(false);
            $table->integer('note');
            $table->string('qr_code')->index();
            $table->boolean('gestion_rbc');
            $table->boolean('archivee')->index()->default(false);
            $table->foreignId('souche_id')->nullable()->constrained('souches')->nullOnDelete();
            $table->foreignId('rucher_id')->nullable()->constrained('ruchers')->nullOnDelete();
            $table->foreignId('reine_id')->unique()->nullable()->constrained('reines')->nullOnDelete();
            $table->foreignId('type_ruche_id')->constrained('types_ruches');
            $table->foreignId('exploitation_id')->constrained('exploitations')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ruches');
    }
};
