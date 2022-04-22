<?php

namespace App\Http\Requests;

use App\Models\Kasalar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKasalarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kasalar_create');
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
