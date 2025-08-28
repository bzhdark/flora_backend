<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('introductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->foreignId('reine_id')->nullable()->constrained('reines')->nullOnDelete();
            $table->foreignId('souche_id')->nullable()->constrained('souches')->nullOnDelete();
            $table->foreignId('mere_id')->nullable()->constrained('reines')->nullOnDelete();
            $table->string('generation')->nullable();
            $table->string('type');
            $table->integer('age_cellule')->nullable();
            $table->string('date_introduction');
            $table->string('date_ctrl_naissance')->nullable();
            $table->string('date_ctrl_ponte')->nullable();
            $table->boolean('echec');
            $table->boolean('terminee');
            $table->string('commentaires')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('introductions');
    }
};
