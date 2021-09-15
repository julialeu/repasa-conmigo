<?php

namespace App\Repositories;

use App\Models\Trial;


class TrialRepository
{
    public function save(Trial $trial)
    {
        $trial->save();
    }
}
