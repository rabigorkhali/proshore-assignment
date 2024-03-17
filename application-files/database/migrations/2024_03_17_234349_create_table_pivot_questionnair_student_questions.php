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
        Schema::create('pivot_questionnaire_student_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('questionnaire_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();
            $table->string('answer',1);
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_questionnaire_student_questions');
    }
};
