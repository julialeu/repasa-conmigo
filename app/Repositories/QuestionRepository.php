<?php

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Database\RecordsNotFoundException;

class QuestionRepository
{
    public function save(Question $question)
    {
        $question->save();
    }

    /**
     * @param int $testId
     * @return Question[]
     */
    public function findByTestId(int $testId): array
    {
        $query = Question::query()
            ->where('test_id', '=', $testId);

        return $query
            ->get()
            ->all();
    }

    /**
     * @param int $testId
     * @return Question
     */
    public function findFirstByTestId(int $testId): Question
    {
        $query = Question::query()
            ->where('test_id', '=', $testId);

        return $query
            ->first();
    }

    public function find(int $questionId): ?Question
    {
        $query = Question::query()
            ->where('id', '=', $questionId);

        return $query
            ->get()
            ->first();
    }

    public function findOrFail(int $questionId): Question
    {
        $question = $this->find($questionId);

        if ($question === null) {
            throw new RecordsNotFoundException('No question found for id ' . $questionId);
        }

        return $question;
    }

    public function findNextQuestion(int $testId, int $currentQuestionId): ?Question
    {
        $query = Question::query()
            ->where('test_id', '=', $testId)
            ->where('id', '>', $currentQuestionId)
            ->limit(1)
            ->orderBy('id', 'ASC');

        return $query
            ->get()
            ->first();
    }


}
