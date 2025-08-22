<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partenaire_rucher', function (Blueprint $table) {
            $table->foreignId('partenaire_id')->constrained('partenaires')->cascadeOnDelete();
            $table->foreignId('rucher_id')->constrained('ruchers')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partenaire_rucher');
    }
};
