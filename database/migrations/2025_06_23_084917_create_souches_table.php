<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('souches', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('exploitation_id')->constrained('exploitations')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('souches');
    }
};
