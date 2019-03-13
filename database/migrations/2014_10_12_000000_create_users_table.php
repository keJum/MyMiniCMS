<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('image_link')->nullable()->default('defualt/noneImage.png');     //link
            $table->integer('role_id')->nullable()->default('не указанно');                //id 
            $table->string('skill')->nullable()->default('не указанно');
            $table->string('email')->unique();
            $table->string('department_id')->nullable()->default('не указанно');           //id
            $table->integer('specialty_id')->nullable()->default('не указанно');           //id
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
