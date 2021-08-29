<?php

namespace App\Repositories;

use App\Models\Test;

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
}
