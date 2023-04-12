<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPolymorphicRelationToPresentationsTable extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('presentations', function (Blueprint $table) {
      $table->unsignedBigInteger('presentable_id');
      $table->string('presentable_type');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('presentations', function (Blueprint $table) {
      $table->dropColumn('presentable_id');
      $table->dropColumn('presentable_type');
    });
  }
}