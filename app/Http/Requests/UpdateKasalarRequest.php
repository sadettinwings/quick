<?php

namespace App\Http\Requests;

use App\Models\Kasalar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKasalarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kasalar_edit');
    }

    public function rules()
    {
        return [
            'kasa_adi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
