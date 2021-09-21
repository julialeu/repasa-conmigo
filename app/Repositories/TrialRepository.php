<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\Trial;
use Illuminate\Database\RecordsNotFoundException;


class TrialRepository
{
    public function save(Trial $trial)
    {
        $trial->save();
    }

//    public function findByTestId(int $testId): array
//    {
//        $query = Question::query()
//            ->where('test_id', '=', $testId);
//
//        return $query
//            ->get()
//            ->all();
//    }
//
//    public function find(int $questionId): ?Question
//    {
//        $query = Question::query()
//            ->where('id', '=', $questionId);
//
//        return $query
//            ->get()
//            ->first();
//    }
//
//    public function findOrFail(int $questionId): Question
//    {
//        $question = $this->find($questionId);
//
//        if ($question === null) {
//            throw new RecordsNotFoundException('No question found for id ' . $questionId);
//        }
//
//        return $question;
//    }
}
