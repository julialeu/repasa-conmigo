<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id')->nullable(false);
            $table->string('title')->nullable(false);
            $table->string('answer1')->nullable(false);
            $table->string('answer2')->nullable(false);
            $table->string('answer3')->nullable(false);
            $table->string('answer4')->nullable(false);
            $table->enum('correct_answer', ['1','2','3','4'])->nullable(false);
            $table->timestamps();
            $table->foreign('test_id')->references('id')->on('tests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
