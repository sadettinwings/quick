<?php

namespace App\Http\Requests;

use App\Models\Alacaklar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAlacaklarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alacaklar_create');
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
            'odeme_tarihi' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
