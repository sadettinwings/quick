<?php

namespace App\Http\Requests;

use App\Models\Rezervasyonlar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRezervasyonlarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rezervasyonlar_create');
    }

    public function rules()
    {
        return [
            'rezervarsyon_kodu' => [
                'string',
                'nullable',
            ],
        ];
    }
}
