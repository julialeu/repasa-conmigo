<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

class GetCorrectAnswerController extends Controller
{
    private QuestionRepository $questionRepository;

    public function __construct(
        QuestionRepository $questionRepository
    ) {
        $this->questionRepository = $questionRepository;
    }

    public function __invoke(Request $request)
    {
        $questionId = $request->route('questionId');
        $question = $this->questionRepository->findOrFail($questionId);

        // Store user's answer in a trial

        return response()->json([
            'correctAnswer' => $question->correctAnswer()
        ]);
    }
}
