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
        Schema::create('pivot_questionnaire_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('questionnnaire_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();
            $table->foreign('questionnnaire_id')->references('id')->on('questionnaires');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_questionnaire_questions');
    }
};
