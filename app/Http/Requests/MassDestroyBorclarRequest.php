<?php

namespace App\Http\Requests;

use App\Models\Borclar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBorclarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('borclar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:borclars,id',
        ];
    }
}
