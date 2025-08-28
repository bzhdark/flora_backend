<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('renouvellements_cires', function (Blueprint $table) {
            $table->id();
$table->foreignId('visite_id')->constrained('visites');
$table->integer('nb_cadres');
$table->string('commentaires')->nullable();
$table->timestamps();//
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('renouvellements_cires');
    }
};
