<?php

namespace App\Repositories;

use App\Models\Test;
use Illuminate\Database\RecordsNotFoundException;

class TestRepository
{
    public function save(Test $test)
    {
        $test->save();
    }

    /**
     * @param int $userId
     * @return Test[]
     */
    public function findByUserId(int $userId): array
    {
        $query = Test::query()
            ->where('user_id', '=', $userId);

        return $query
            ->get()
            ->all();
    }

    public function find(int $testId): ?Test
    {
        $query = Test::query()
            ->where('id', '=', $testId);

        return $query
            ->get()
            ->first();
    }

    public function findOrFail(int $testId): Test
    {
        $test = $this->find($testId);

        if ($test === null) {
            throw new RecordsNotFoundException('No test found for id ' . $testId);
        }

        return $test;
    }
}
