<?php

namespace App\Http\Requests\Transactions;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class InventoryTransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'begin_date' => ['required', 'string', 'date_format:Y-m-d h:i'],
            'end_date' => ['required', 'string', 'date_format:Y-m-d h:i'],
        ];
    }

    public function getBeginDate(): bool|Carbon
    {
        return Carbon::createFromFormat('Y-m-d h:i', $this->validated()['begin_date']);
    }

    public function getEndDate(): bool|Carbon
    {
        return Carbon::createFromFormat('Y-m-d h:i', $this->validated()['end_date']);
    }
}
