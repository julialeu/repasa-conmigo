<?php

namespace App\Http\Controllers;

use App\Models\Trial;
use App\Repositories\QuestionRepository;
use App\Repositories\TrialRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TakeTestController
{
    private TrialRepository $trialRepository;
    private QuestionRepository $questionRepository;

    public function __construct(
        TrialRepository $trialRepository,
        QuestionRepository $questionRepository
    ){
        $this->trialRepository = $trialRepository;
        $this->questionRepository = $questionRepository;
    }

    public function __invoke(Request $request)
    {
        $testId = $request->route('testId');
        $user = Auth::user();
        $userId = $user->id();

        $trial = (new Trial())
            ->setTestId($testId)
            ->setUserId($userId);
        $this->trialRepository->save($trial);

        $trialId = $trial->id();

        $firstQuestion = $this->questionRepository->findFirstByTestId($testId);
        $questionId = $firstQuestion->id();

        $route = '/trial/' . $trialId . '/' . $questionId;

        return redirect($route);
    }
}
