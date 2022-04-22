<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHarcamaKategorileriRequest;
use App\Http\Requests\UpdateHarcamaKategorileriRequest;
use App\Http\Resources\Admin\HarcamaKategorileriResource;
use App\Models\HarcamaKategorileri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HarcamaKategorileriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('harcama_kategorileri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HarcamaKategorileriResource(HarcamaKategorileri::all());
    }

    public function store(StoreHarcamaKategorileriRequest $request)
    {
        $harcamaKategorileri = HarcamaKategorileri::create($request->all());

        return (new HarcamaKategorileriResource($harcamaKategorileri))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HarcamaKategorileri $harcamaKategorileri)
    {
        abort_if(Gate::denies('harcama_kategorileri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HarcamaKategorileriResource($harcamaKategorileri);
    }

    public function update(UpdateHarcamaKategorileriRequest $request, HarcamaKategorileri $harcamaKategorileri)
    {
        $harcamaKategorileri->update($request->all());

        return (new HarcamaKategorileriResource($harcamaKategorileri))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HarcamaKategorileri $harcamaKategorileri)
    {
        abort_if(Gate::denies('harcama_kategorileri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcamaKategorileri->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
