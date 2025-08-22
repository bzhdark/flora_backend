<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('hausse_pose_hausses', function (Blueprint $table) {
      $table->foreignId('hausse_id')->constrained('hausses');
      $table->foreignId('pose_hausse_id')->constrained('poses_hausses');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('hausse_pose_hausses');
  }
};
