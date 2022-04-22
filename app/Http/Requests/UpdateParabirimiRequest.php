<?php

namespace App\Http\Requests;

use App\Models\Parabirimi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateParabirimiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('parabirimi_edit');
    }

    public function rules()
    {
        return [
            'birim' => [
                'string',
                'nullable',
            ],
        ];
    }
}
