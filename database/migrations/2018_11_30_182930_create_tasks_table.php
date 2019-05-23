<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default('без названия');
            $table->string('description',4096)->nullable()->default('без описания');
            $table->integer('file')->nullable();
            $table->string('provider_id')->nullable()->default('не назначен');
            $table->string('respon_id')->nullable()->default('не назначен');
            $table->string('developer_id')->nullable()->default('не назначен');
            $table->string('tester_id')->nullable()->default('не назначен');
            $table->integer('importance')->nullable();
            $table->integer('complexity')->nullable();
            $table->integer('progress')->nullable();
            $table->integer('status')->nullable();
            $table->timestamp('startDevelopment_at')->nullable();
            $table->timestamp('finishDevelopment_at')->nullable();
            $table->timestamp('startTesting_at')->nullable();
            $table->timestamp('finishTesting_at')->nullable();
            $table->timestamp('finish_at')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}