<?php

namespace App\Http\Requests;

use App\Models\TesisOdemeleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTesisOdemeleriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tesis_odemeleri_create');
    }

    public function rules()
    {
        return [
            'tutar' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
