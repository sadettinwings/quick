<?php

namespace App\Http\Requests;

use App\Models\HarcamaKategorileri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHarcamaKategorileriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('harcama_kategorileri_create');
    }

    public function rules()
    {
        return [
            'hkategori' => [
                'string',
                'nullable',
            ],
        ];
    }
}
