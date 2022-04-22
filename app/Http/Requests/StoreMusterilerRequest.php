<?php

namespace App\Http\Requests;

use App\Models\Musteriler;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMusterilerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('musteriler_create');
    }

    public function rules()
    {
        return [
            'musteri_adi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
