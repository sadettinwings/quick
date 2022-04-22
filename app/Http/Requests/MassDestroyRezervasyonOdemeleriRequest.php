<?php

namespace App\Http\Requests;

use App\Models\RezervasyonOdemeleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRezervasyonOdemeleriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('rezervasyon_odemeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rezervasyon_odemeleris,id',
        ];
    }
}
