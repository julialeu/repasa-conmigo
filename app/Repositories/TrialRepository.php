<?php

namespace App\Repositories;

use App\Models\Trial;
use Illuminate\Database\RecordsNotFoundException;


class TrialRepository
{
    public function save(Trial $trial)
    {
        $trial->save();
    }

    public function findOrFail(int $trialId): Trial
    {
        $trial = $this->find($trialId);

        if ($trial === null) {
            throw new RecordsNotFoundException('No trial found for id ' . $trialId);
        }

        return $trial;
    }

    private function find(int $trialId): ?Trial
    {
        $query = Trial::query()
            ->where('id', '=', $trialId);

        return $query
            ->get()
            ->first();
    }
}
