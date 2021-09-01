<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function testObj(): Test
    {
        return $this->get('test');
    }

    public function id(): int
    {
        return $this->getAttributeValue('id');
    }

    public function title(): string
    {
        return $this->getAttributeValue('title');
    }

    public function setTitle(string $title): self
    {
        return $this->setAttribute('title', $title);
    }

    public function answer1(): string
    {
        return $this->getAttributeValue('answer1');
    }

    public function setAnswer1(string $answer1): self
    {
        return $this->setAttribute('answer1', $answer1);
    }

    public function answer2(): string
    {
        return $this->getAttributeValue('answer2');
    }

    public function setAnswer2(string $answer2): self
    {
        return $this->setAttribute('answer2', $answer2);
    }

    public function answer3(): string
    {
        return $this->getAttributeValue('answer3');
    }

    public function setAnswer3(string $answer3): self
    {
        return $this->setAttribute('answer3', $answer3);
    }

    public function answer4(): string
    {
        return $this->getAttributeValue('answer4');
    }

    public function setAnswer4(string $answer4): self
    {
        return $this->setAttribute('answer4', $answer4);
    }

    public function correctAnswer(): int
    {
        return $this->getAttributeValue('answer4');
    }

    public function setCorrectAnswer(int $correctAnswer): self
    {
        return $this->setAttribute('correctAnswer', $correctAnswer);
    }

    public function testId(): int
    {
        return $this->getAttributeValue('test_id');
    }

    public function setTestId(int $test_id): self
    {
        return $this->setAttribute('test_id', $test_id);
    }
}
