<?php

namespace App\Http\Requests;

use App\Models\PersonelOdemeKategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePersonelOdemeKategoriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('personel_odeme_kategori_edit');
    }

    public function rules()
    {
        return [
            'pkategori' => [
                'string',
                'nullable',
            ],
        ];
    }
}
