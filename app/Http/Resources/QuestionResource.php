<?php

namespace App\Http\Resources;

use App\Enums\Question\Status;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Question
 */
class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'title' => $this->title,
            'status' => [
                'status' => $this->status,
                'status-code' => Status::getKey($this->status)
            ],
            'message' => $this->message,
            'project_id' => $this->project_id,
            'worker_id' => $this->worker_id,
        ];
    }
}
