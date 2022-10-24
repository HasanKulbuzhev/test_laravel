<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function create(User $user): Response
    {
        return ($user->project->user_id === $user->id)
            ? Response::allow()
            : Response::deny('У вас нет прав');
    }

    public function answer(User $user, Question $question): Response
    {
        return $question->isActive()
            ? Response::allow()
            : Response::deny('Вопрос в архиве');
    }

    public function update(User $user, Question $question): Response
    {
        return ($user->project_id === $question->project_id) &&
            ($user->project->user_id === $user->id) &&
            ($question->isActive())
            ? Response::allow()
            : Response::deny('У вас нет прав');
    }

    public function delete(User $user, Question $question): Response
    {
        return ($user->project_id === $question->project_id) &&
            ($user->project->user_id === $user->id) &&
            ($question->isActive())
            ? Response::allow()
            : Response::deny('У вас нет прав');
    }
}
