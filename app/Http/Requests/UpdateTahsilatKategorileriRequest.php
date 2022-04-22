<?php

namespace App\Http\Requests;

use App\Models\TahsilatKategorileri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTahsilatKategorileriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tahsilat_kategorileri_edit');
    }

    public function rules()
    {
        return [
            'tkategori_adi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
