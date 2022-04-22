<?php

namespace App\Http\Requests;

use App\Models\Alacaklar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAlacaklarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('alacaklar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:alacaklars,id',
        ];
    }
}
