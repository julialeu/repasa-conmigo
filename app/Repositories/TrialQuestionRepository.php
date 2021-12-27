<?php

namespace App\Repositories;

use App\Models\TrialQuestion;

class TrialQuestionRepository
{
    public function save(TrialQuestion $trialQuestion)
    {
        $trialQuestion->save();
    }
}
