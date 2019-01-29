<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('appointment')->nullable()->default('не указанно');
            $table->string('department_id')->nullable()->default('не указанно');
            $table->string('specialty')->nullable()->default('не указанно');
            $table->string('skill')->nullable()->default('не указанно');
            $table->string('schedule')->nullable()->default('не указанно');
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
        Schema::dropIfExists('developers');
    }
}
