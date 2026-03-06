<?php

use App\Models\Ruche;
use App\Models\Rucher;
use App\Models\Exploitation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('visites', function (Blueprint $table) {
      $table->id();
      $table->string('date');
      $table->foreignIdFor(Exploitation::class)->constrained('exploitations')->cascadeOnDelete();
      $table->foreignId('auteur_id')->constrained('users')->nullOnDelete();
      $table->foreignIdFor(Ruche::class)->constrained('ruches')->cascadeOnDelete();
      $table->foreignIdFor(Rucher::class)->nullable()->constrained('ruchers')->nullOnDelete();
      $table->string('nom')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('visites');
  }
};
