<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hausses', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('qr_code');
            $table->foreignId('ruche_id')->nullable()->constrained('ruches')->nullOnDelete();
            $table->foreignId('exploitation_id')->nullable()->constrained('exploitations')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hausses');
    }
};
