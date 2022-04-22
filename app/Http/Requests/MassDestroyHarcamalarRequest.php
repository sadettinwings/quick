<?php

namespace App\Http\Requests;

use App\Models\Harcamalar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHarcamalarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('harcamalar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:harcamalars,id',
        ];
    }
}
