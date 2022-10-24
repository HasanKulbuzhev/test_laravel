<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Models\User;
use App\Services\Question\CreateQuestionService;
use App\Services\Question\QuestionBuilderService;
use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $builder = (new QuestionBuilderService(Question::query(), $request))->run();

        return QuestionResource::collection($builder->paginate());
    }

    public function store(StoreQuestionRequest $request, Question $question)
    {
        DB::beginTransaction();

        try {
            /** @var User $user */
            $user = Auth::user();

            if ((new CreateQuestionService($user->project, $question, $request))->run()) {
                DB::commit();

                return new QuestionResource($question->refresh());
            }

            return new Exception('Не удалось сохранить');
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        DB::beginTransaction();

        try {
            /** @var User $user */
            $user = Auth::user();


            if ((new CreateQuestionService($user->project, $question, $request))->run()) {
                DB::commit();

                return new QuestionResource($question->refresh());
            }

            return new Exception('Не удалось сохранить');
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function destroy(Question $question)
    {
        DB::beginTransaction();

        try {
            if ($question->delete()) {
                DB::commit();

                return response()->json([], 200);
            }

            return new Exception('Не удалось сохранить');
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }
}
