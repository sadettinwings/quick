<?php

namespace App\Http\Requests;

use App\Models\Harcamalar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHarcamalarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('harcamalar_edit');
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
            'tarih' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
