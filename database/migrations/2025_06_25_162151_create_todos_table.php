<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description')->nullable();
            $table->foreignId('rucher_id')->nullable();
            $table->foreignId('ruche_id')->nullable();
            $table->foreignId('exploitation_id')->constrained('exploitations')->cascadeOnDelete();
            $table->string('date')->nullable();
            $table->date('date_notification')->nullable()->index();
            $table->boolean('notif_envoyee')->default(false)->index();
            $table->boolean('fait')->default(false)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
