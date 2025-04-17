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
        Schema::create('questions', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->foreignId('knowledge_id')->constrained('knowledges')->onDelete('cascade'); // id of the knowledge test
            $table->text('question_text'); // text for each questions
            $table->json('choices'); // choices of each questions
            $table->json('correct_answers'); // correct answers of each questions
            $table->enum('difficulty', ['easy', 'medium', 'hard']); // difficulty of questions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
