<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100)->nullable(false);
            $table->string('lastname', 100)->nullable(false);
            $table->string('email')->unique();
            $table->string('phone', 50)->nullable(false);
            $table->string('country', 100)->nullable(false);
            $table->string('state', 100)->nullable(false);
            $table->string('city', 100)->nullable(false);
            $table->string('comments', 250)->nullable(true);
            $table->boolean('policy_acceptance_check')->default(false);
            $table->uuid('program_id')->nullable(false);
            $table->uuid('area_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('program_id')
                ->references('id')
                ->on('programs');
            $table->foreign('area_id')
                ->references('id')
                ->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
