<?php

namespace App\Services\Question;

use App\Interfaces\BaseServiceInterface;
use App\Models\Question;
use App\Services\Base\BuilderService;
use Illuminate\Database\Eloquent\Builder;

class QuestionBuilderService extends BuilderService implements BaseServiceInterface
{
    protected array $filters = [
        'title' => 'title',
        'worker_id' => 'worker',
        'project_id' => 'project'
    ];

    public function run(): Builder
    {
        $this->filter();

        return $this->builder;
    }

    protected function title($value)
    {
        /** @see Question::scopeOfTitle() */
        return $this->builder->ofTitle($value);
    }

    protected function worker(int $value)
    {
        /** @see Question::scopeOfWorker() */
        return $this->builder->ofWorker($value);
    }

    protected function project(int $value)
    {
        /** @see Question::scopeOfProject() */
        return $this->builder->ofProject($value);
    }
}
