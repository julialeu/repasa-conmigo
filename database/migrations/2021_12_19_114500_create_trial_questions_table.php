<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrialQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('trial_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trial_id')->nullable(false);
            $table->unsignedBigInteger('question_id')->nullable(false);
            $table->enum('user_answer', ['1','2','3','4'])->nullable(false);
            $table->boolean('user_answer_was_correct')->nullable(false);
            $table->timestamps();

            $table->foreign('trial_id')->references('id')->on('trials');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('trial_questions');
    }
}
