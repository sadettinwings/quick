<?php

namespace App\Http\Requests;

use App\Models\Cariler;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarilerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cariler_create');
    }

    public function rules()
    {
        return [
            'cari_adi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
