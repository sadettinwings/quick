<?php

namespace App\Http\Requests;

use App\Models\BorcKategorileri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBorcKategorileriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('borc_kategorileri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:borc_kategorileris,id',
        ];
    }
}
