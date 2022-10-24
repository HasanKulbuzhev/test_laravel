<?php

namespace App\Services\Question;

use App\Enums\Question\Status;
use App\Http\Requests\Question\AnswerQuestionRequest;
use App\Interfaces\BaseServiceInterface;
use App\Models\Question;
use App\Services\Email\EmailService;
use Auth;

class SetQuestionCommentService implements BaseServiceInterface
{
    private Question $question;
    private AnswerQuestionRequest $request;

    public function __construct(Question $question, AnswerQuestionRequest $request)
    {
        $this->question = $question;
        $this->request = $request;
    }

    public function run(): bool
    {
        $isSave = (new EmailService($this->question->email, $this->request->answer))->send();
        $isSave = $isSave && (new UpdateQuestionService($this->question, [
                'comment' => $this->request->post('answer'),
                'worker_id' => Auth::user()->id,
                'status' => Status::RESOLVED
            ]))->run();

        return $isSave;
    }
}
