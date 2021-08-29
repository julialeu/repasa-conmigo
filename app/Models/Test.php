<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userObj(): User
    {
        return $this->getRelationValue('user');
    }

    public function title(): string
    {
        return $this->getAttributeValue('title');
    }

    public function setTitle(string $title): self
    {
        return $this->setAttribute('title', $title);
    }

    public function description(): string
    {
        return $this->getAttributeValue('description');
    }

    public function setDescription(string $description): self
    {
        return $this->setAttribute('description', $description);
    }

    public function userId(): int
    {
        return $this->getAttributeValue('user_id');
    }

    public function setUserId(int $user_id): self
    {
        return $this->setAttribute('user_id', $user_id);
    }
}
