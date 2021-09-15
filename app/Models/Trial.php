<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trial extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userObj(): User
    {
        return $this->getRelationValue('user');
    }

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function testObj(): Test
    {
        return $this->getRelationValue('test');
    }

    public function CreatedAt(): Carbon
    {
        return Carbon::parse($this->getAttributeValue('created_at'));
    }
}
