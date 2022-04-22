<?php

namespace App\Http\Requests;

use App\Models\Parabirimi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreParabirimiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('parabirimi_create');
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
