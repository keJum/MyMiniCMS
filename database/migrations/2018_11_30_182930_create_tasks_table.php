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
            $table->string('taskName');
            $table->integer('imageAvatar')->nullable();
            $table->string('taskProvider_id');
            $table->string('taskDeveloper_id');
            $table->string('taskTester_id')->nullable();
            $table->integer('taskImportance');
            $table->integer('taskComplexity');
            $table->integer('taskProgress');
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
