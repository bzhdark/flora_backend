<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('role_rucher', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $table->foreignId('rucher_id')->constrained('ruchers')->cascadeOnDelete();
            $table->boolean('peut_modifier')->index();
            $table->boolean('peut_lire')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_rucher');
    }
};
