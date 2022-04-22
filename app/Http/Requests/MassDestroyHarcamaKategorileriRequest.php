<?php

namespace App\Http\Requests;

use App\Models\HarcamaKategorileri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHarcamaKategorileriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('harcama_kategorileri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:harcama_kategorileris,id',
        ];
    }
}
