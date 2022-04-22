<?php

namespace App\Http\Requests;

use App\Models\TesisOdemeleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTesisOdemeleriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tesis_odemeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tesis_odemeleris,id',
        ];
    }
}
