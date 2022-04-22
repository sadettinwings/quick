<?php

namespace App\Http\Requests;

use App\Models\RezervasyonTahsilat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRezervasyonTahsilatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('rezervasyon_tahsilat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rezervasyon_tahsilats,id',
        ];
    }
}
