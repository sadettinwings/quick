<?php

namespace App\Http\Requests;

use App\Models\PersonelOdemeKategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPersonelOdemeKategoriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('personel_odeme_kategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:personel_odeme_kategoris,id',
        ];
    }
}
