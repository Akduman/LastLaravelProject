<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchingQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matching_questions', function (Blueprint $table) {
            $table->id(); 
            $table->string('question');
            $table->string('option_a');           
            $table->string('answer_a');  

            $table->string('option_b');           
            $table->string('answer_b');

            $table->string('option_c');           
            $table->string('answer_c');  

            $table->string('option_d');           
            $table->string('answer_d');  
            $table->bigInteger('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matching_questions');
    }
}
