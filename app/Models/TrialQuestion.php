<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrialQuestion extends Model
{
    // Start region relations

    public function trial(): BelongsTo
    {
        return $this->belongsTo(Trial::class, 'trial_id');
    }

    public function trialObj(): Trial
    {
        return $this->getRelationValue('trial');
    }
    // End region Relations

    // Start region Getters/Setters

    public function id(): int
    {
        return $this->getAttributeValue('id');
    }

    public function setId(int $id): self
    {
        return $this->setAttribute('id', $id);
    }

    public function trialId(): int
    {
        return $this->getAttributeValue('trial_id');
    }

    public function setTrialId(int $trialId): self
    {
        return $this->setAttribute('trial_id', $trialId);
    }

    public function questionId(): int
    {
        return $this->getAttributeValue('question_id');
    }

    public function setQuestionId(int $questionId): self
    {
        return $this->setAttribute('question_id', $questionId);
    }

    public function userAnswer(): string
    {
        return $this->getAttributeValue('user_answer');

    }

    public function setUserAnswer(string $userAnswer): self
    {
        return $this->setAttribute('user_answer', $userAnswer);
    }

    public function userAnswerWasCorrect(): bool
    {
        return $this->getAttributeValue('user_answer');

    }

    public function setUserAnswerWasCorrect(bool $userAnswerWasCorrect): self
    {
        return $this->setAttribute('user_answer_was_correct', $userAnswerWasCorrect);
    }
    // End region Getters/Setters
}
