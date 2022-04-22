<?php

namespace App\Http\Requests;

use App\Models\EvSahipleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEvSahipleriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ev_sahipleri_create');
    }

    public function rules()
    {
        return [
            'evsahibi_adi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
