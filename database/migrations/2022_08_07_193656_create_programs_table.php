<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('programs', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('program_name', 500)->nullable();
      $table->bigInteger('area_id')->unsigned();
      $table->foreign('area_id')->references('id')->on('areas');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('programs');
  }
}
