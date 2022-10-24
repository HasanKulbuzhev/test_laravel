<?php

namespace App\Services\Question;

use App\Interfaces\BaseServiceInterface;
use App\Models\Question;

class UpdateQuestionService implements BaseServiceInterface
{
    private Question $question;
    private array $data;

    public function __construct(Question $question, array $data)
    {
        $this->question = $question;
        $this->data = $data;
    }

    public function run(): bool
    {
        $this->question->fill($this->data);

        return $this->question->save();
    }
}
