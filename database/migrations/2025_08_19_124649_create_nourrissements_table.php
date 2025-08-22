<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nourrissements', function (Blueprint $table) {
            $table->id();
            $table->integer('qte_sirop');
            $table->integer('qte_candi');
            $table->integer('qte_miel');
            $table->integer('qte_pate_proteinee');
            $table->foreignId('visite_id')->constrained('visites')->cascadeOnDelete();
            $table->foreignId('sirop_id')->nullable()->constrained('sirops')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nourrissements');
    }
};
