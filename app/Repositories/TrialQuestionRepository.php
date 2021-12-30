<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\TrialQuestion;
use Illuminate\Database\RecordsNotFoundException;

class TrialQuestionRepository
{
    public function save(TrialQuestion $trialQuestion)
    {
        $trialQuestion->save();
    }

    public function countByQuestionIdAndTrialId(
        int $questionId,
        int $trialId
    ): int {
        $query = TrialQuestion::query()
            ->where('question_id', '=', $questionId)
            ->where('trial_id', '=', $trialId);

            return $query->get()->count();
    }

    public function getCorrectAnswers(int $trialId): int
    {
        $query = TrialQuestion::query()
            ->where('trial_id', '=', $trialId)
            ->where('user_answer_was_correct', '=', 1);

        return $query->get()->count();
    }

    public function getFailedAnswers(int $trialId): int
    {
        $query = TrialQuestion::query()
            ->where('trial_id', '=', $trialId)
            ->where('user_answer_was_correct', '=', 0);

        return $query->get()->count();
    }
}
