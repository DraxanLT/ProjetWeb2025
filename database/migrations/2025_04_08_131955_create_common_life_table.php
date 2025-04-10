<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('common_life', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id('task_id')->autoIncrement()->primary(); // id that is attributed for each tasks
            $table->foreignId('user_id')->references('id')->on('users'); // id of the user that created the task
            $table->string('title'); // title of the task
            $table->text('description'); // description of the task
            $table->timestamps(); // date and time of when the task is created and updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_life');
    }
};
