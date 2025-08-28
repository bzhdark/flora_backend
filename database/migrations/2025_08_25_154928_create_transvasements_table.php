<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transvasements', function (Blueprint $table) {
            $table->id();
$table->foreignId('visite_id')->constrained('visites');
$table->foreignId('ruche_destination_id')->nullable();
$table->foreignId('ruche_origine_id')->nullable();
$table->timestamps();//
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transvasements');
    }
};
