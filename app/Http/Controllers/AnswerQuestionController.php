<?php

namespace App\Http\Controllers;

use App\Models\TrialQuestion;
use App\Repositories\TrialQuestionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnswerQuestionController extends Controller
{
    private TrialQuestionRepository $trialQuestionRepository;

    public function __construct(TrialQuestionRepository $trialQuestionRepository) {
        $this->trialQuestionRepository = $trialQuestionRepository;
    }

    public function __invoke(Request $request)
    {
        $questionId = $request->route('questionId');
        $trialId = $request->route('trialId');

        \Log::info('debug 1');
        \Log::info($questionId);
        \Log::info($trialId);

        $trialQuestion = (new TrialQuestion())
            ->setTrialId($trialId)
            ->setQuestionId($questionId);



      $data = [
          'bob' => 'esponja'
      ];

        return new JsonResponse($data);
    }
}
