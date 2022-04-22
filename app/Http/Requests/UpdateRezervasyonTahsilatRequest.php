<?php

namespace App\Http\Requests;

use App\Models\RezervasyonTahsilat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRezervasyonTahsilatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rezervasyon_tahsilat_edit');
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
