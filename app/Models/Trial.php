<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trial extends Model
{
    // Start region relations

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

    public function testId(): int
    {
        return $this->getAttributeValue('test_id');
    }

    public function setTestId(int $testId): self
    {
        return $this->setAttribute('test_id', $testId);
    }

    public function userId(): int
    {
        return $this->getAttributeValue('user_id');
    }

    public function setUserId(int $userId): self
    {
        return $this->setAttribute('user_id', $userId);
    }

    public function createdAt(): Carbon
    {
        return Carbon::parse($this->getAttributeValue('created_at'));
    }
    // End region Getters/Setters
}
