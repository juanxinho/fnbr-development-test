<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoFuniberTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('info_funiber', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->string('names', 255);
      $table->string('lastnames', 255);
      $table->string('email', 255);
      $table->string('country', 255);
      $table->string('state', 255);
      $table->string('city', 255);

      $table->bigInteger('program_id')->unsigned();
      $table->foreign('program_id')->references('id')->on('programs');

      $table->bigInteger('area_id')->unsigned();
      $table->foreign('area_id')->references('id')->on('areas');

      $table->string('phone', 10);
      $table->text('comments')->nullable();
      $table->boolean('policy');

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
    Schema::dropIfExists('info_funiber');
  }
}
