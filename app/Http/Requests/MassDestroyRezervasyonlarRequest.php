<?php

namespace App\Http\Requests;

use App\Models\Rezervasyonlar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRezervasyonlarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('rezervasyonlar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rezervasyonlars,id',
        ];
    }
}
