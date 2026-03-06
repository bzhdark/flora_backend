<?php

use App\Models\Exploitation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('types_ruches', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('nb_cadres');
            $table->foreignIdFor(Exploitation::class)->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('type_ruches');
    }
};
