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
        Schema::create('knowledges', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->string('title'); // title of the knowledge test
            $table->json('languages'); // languages for the questions
            $table->unsignedInteger('questions_nbr'); // number of questions per test
            $table->unsignedInteger('answers_nbr'); // number of answers per questions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledges');
    }
};
