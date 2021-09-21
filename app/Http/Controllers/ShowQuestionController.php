<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

class ShowQuestionController extends Controller
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
        return view(
            'show_question',
            [
                'question' => $question
            ]
        );
    }
}
