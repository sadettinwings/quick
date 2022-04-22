<?php

namespace App\Http\Requests;

use App\Models\TahsilatKategorileri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTahsilatKategorileriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tahsilat_kategorileri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tahsilat_kategorileris,id',
        ];
    }
}
