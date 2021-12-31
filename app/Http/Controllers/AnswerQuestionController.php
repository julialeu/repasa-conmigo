<?php

namespace App\Http\Controllers;

use App\Models\TrialQuestion;
use App\Repositories\QuestionRepository;
use App\Repositories\TestRepository;
use App\Repositories\TrialQuestionRepository;
use App\Repositories\TrialRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RuntimeException;

class AnswerQuestionController extends Controller
{
    private TrialQuestionRepository $trialQuestionRepository;
    private QuestionRepository $questionRepository;
    private TrialRepository $trialRepository;

    public function __construct(
        TrialQuestionRepository $trialQuestionRepository,
        QuestionRepository $questionRepository,
        TrialRepository $trialRepository

    ) {
        $this->trialQuestionRepository = $trialQuestionRepository;
        $this->questionRepository = $questionRepository;
        $this->trialRepository = $trialRepository;
    }

    public function __invoke(Request $request)
    {
        $questionId = $request->route('questionId');
        $trialId = $request->route('trialId');

        // Assert that the answer is not repeated in the same trial
        $numTrialQuestions = $this->trialQuestionRepository->countByQuestionIdAndTrialId(
            $questionId,
            $trialId
        );
        // Uncomment when front is ready
//        if ($numTrialQuestions > 0) {
//            return new JsonResponse([
//                'message' => 'La respuesta ya ha sido respondida'
//            ], 400);
//        }

        $question = $this->questionRepository->findOrFail($questionId);
        $correctAnswer = $question->correctAnswer();
        $payLoad = json_decode($request->getContent(), true);
        $userAnswer = $payLoad['userAnswer'];


        if ($userAnswer === $correctAnswer) {
            $isCorrectAnswer = true;

        } else {
            $isCorrectAnswer = false;

        }

        $trialQuestion = (new TrialQuestion())
            ->setTrialId($trialId)
            ->setQuestionId($questionId)
            ->setUserAnswer($userAnswer)
            ->setUserAnswerWasCorrect($isCorrectAnswer);
        $this->trialQuestionRepository->save($trialQuestion);

        // ----------

        $trial = $this->trialRepository->findOrFail($trialId);
        $testId = $trial->testId();
        $nextQuestion = $this->questionRepository->findNextQuestion(
            $testId,
            $questionId
        );

        if ($nextQuestion === null) {
            // Hemos terminado el test
            $nextQuestionId = null;
            $numCorrectAnswers = $this->trialQuestionRepository->getCorrectAnswers($trialId);
            $numFailedAnswers = $this->trialQuestionRepository->getFailedAnswers($trialId);
            $startTime = $trial->createdAt();
            $finishTime = Carbon::now();

            $totalDuration = $finishTime->diffInSeconds($startTime);
            $timeTaken = gmdate('H:i:s', $totalDuration);
            $repeatTestId = $trial->testId();

        } else {
            $nextQuestionId = $nextQuestion->id();
            $numCorrectAnswers = null;
            $numFailedAnswers = null;
            $startTime = null;
            $timeTaken = null;
            $finishTime = null;
            $repeatTestId = null;
        }

        $data = [
            'isCorrectAnswer' => $isCorrectAnswer,
            'correctAnswer' => $correctAnswer,
            'nextQuestionId' => $nextQuestionId,
            'numCorrectAnswers' => $numCorrectAnswers,
            'numFailedAnswers' => $numFailedAnswers,
            'timeTaken' => $timeTaken,
            'repeatTestId' => $repeatTestId

        ];

        return new JsonResponse($data);
    }
}
