<?php

namespace App\Http\Requests;

use App\Models\DigerTahsilat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDigerTahsilatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('diger_tahsilat_create');
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
