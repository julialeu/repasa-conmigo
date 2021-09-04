<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

class CreateQuestionController
{
    private QuestionRepository $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function __invoke(Request $request)
    {
        $title = $request->input('title');
        $answer1 = $request->input('answer1');
        $answer2 = $request->input('answer2');
        $answer3 = $request->input('answer3');
        $answer4 = $request->input('answer4');
        $correctAnswer = $request->input('correctAnswer');
        $testId = $request->input('testId');

        $question = (new Question())
            ->setTitle($title)
            ->setAnswer1($answer1)
            ->setAnswer2($answer2)
            ->setAnswer3($answer3)
            ->setAnswer4($answer4)
            ->setCorrectAnswer($correctAnswer)
            ->setTestId($testId);

        $this->questionRepository->save($question);

        $routeName = '/test/' . $testId;

        return redirect($routeName);
    }
}
