<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('poses_elements', function (Blueprint $table) {
            $table->id();
$table->foreignId('visite_id')->constrained('visites');
$table->boolean('grille_a_reine');
$table->boolean('grille_a_propolis');
$table->boolean('chasse_abeilles');
$table->boolean('bonnet');
$table->boolean('chaussette');
$table->boolean('chaussure');
$table->boolean('echarpe');
$table->boolean('coussin');
$table->boolean('lange');
$table->boolean('lanieres');
$table->boolean('trappe_a_pollen');
$table->timestamps();//
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('poses_elements');
    }
};
