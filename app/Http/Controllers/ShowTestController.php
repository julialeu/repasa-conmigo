<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use App\Repositories\TestRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Log\InvalidArgumentException;

class ShowTestController
{
    private TestRepository $testRepository;
    private QuestionRepository $questionRepository;

    public function __construct(
        TestRepository $testRepository,
        QuestionRepository $questionRepository
    ) {
        $this->testRepository = $testRepository;
        $this->questionRepository = $questionRepository;
    }

    public function __invoke(Request $request)
    {
        $testId = $request->route('testId');

        $test = $this->testRepository->findOrFail($testId);

        $questionList = $this->questionRepository->findByTestId($testId);

        $loggedUser = Auth::user();
        $loggedUserId = $loggedUser->id();

        $userIdOfTest = $test->userId();

        if ( $loggedUserId !== $userIdOfTest) {
            throw new InvalidArgumentException('Parámetros incorrectos, pringao');
        }

        $data =  [
            'test' => $test,
            'questions' => $questionList
        ];



        return view('show_test', $data);
    }
}
