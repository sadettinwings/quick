<?php

namespace App\Http\Requests;

use App\Models\PersonelOdemeleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePersonelOdemeleriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('personel_odemeleri_edit');
    }

    public function rules()
    {
        return [
            'tarih' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tutar' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
