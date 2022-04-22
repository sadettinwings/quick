<?php

namespace App\Http\Requests;

use App\Models\RezervasyonOdemeleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRezervasyonOdemeleriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rezervasyon_odemeleri_create');
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
