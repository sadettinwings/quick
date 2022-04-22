<?php

namespace App\Http\Requests;

use App\Models\EvSahipleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEvSahipleriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ev_sahipleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ev_sahipleris,id',
        ];
    }
}
