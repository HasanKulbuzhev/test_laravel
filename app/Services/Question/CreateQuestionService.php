<?php

namespace App\Services\Question;

use App\Enums\Question\Status;
use App\Http\Requests\StoreQuestionRequest;
use App\Interfaces\BaseServiceInterface;
use App\Models\Project;
use App\Models\Question;

class CreateQuestionService implements BaseServiceInterface
{
    private Project $project;
    private Question $question;
    private StoreQuestionRequest $request;

    /**
     * CreateQuestionService constructor.
     * @param Project $project
     * @param Question $question
     * @param StoreQuestionRequest $request
     */
    public function __construct(Project $project, Question $question, StoreQuestionRequest $request)
    {
        $this->project = $project;
        $this->question = $question;
        $this->request = $request;
    }

    public function run(): bool
    {
        $this->question->fill($this->request->post());

        $this->question->status = Status::ACTIVE;
        $this->question->project_id = $this->project->id;
        return $this->question->save();
    }
}
