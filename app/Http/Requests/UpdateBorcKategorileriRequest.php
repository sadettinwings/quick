<?php

namespace App\Http\Requests;

use App\Models\BorcKategorileri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBorcKategorileriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('borc_kategorileri_edit');
    }

    public function rules()
    {
        return [
            'bkategori_adi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
