<?php

namespace App\Http\Requests;

use App\Models\PersonelOdemeleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPersonelOdemeleriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('personel_odemeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:personel_odemeleris,id',
        ];
    }
}
