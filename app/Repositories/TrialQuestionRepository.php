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
}
