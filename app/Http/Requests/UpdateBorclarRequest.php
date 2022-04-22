<?php

namespace App\Http\Requests;

use App\Models\Borclar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBorclarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('borclar_edit');
    }

    public function rules()
    {
        return [
            'borc_aciklama' => [
                'string',
                'nullable',
            ],
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
