<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reines', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->index();
            $table->foreignId('exploitation_id')->constrained('exploitations')->cascadeOnDelete();
            $table->foreignId('souche_id')->nullable()->constrained('souches')->nullOnDelete();
            $table->integer('annee_naissance');
            $table->string('numero_dossard')->nullable();
            $table->boolean('marquee');
            $table->boolean('morte')->default(false);
            $table->boolean('vendue')->default(false);
            $table->boolean('donnee')->default(false);
            $table->boolean('essaimee')->default(false);
            $table->string('generation')->nullable();
            $table->foreignId("mere_id")->nullable()->constrained("reines")->nullOnDelete();
            $table->string('pere')->nullable();
            $table->string('commentaires')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reines');
    }
};
