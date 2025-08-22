<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('types_cadres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->boolean('est_divisible');
            $table->string('initiales');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('types_cadres');
    }
};
