<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHarcamalarRequest;
use App\Http\Requests\UpdateHarcamalarRequest;
use App\Http\Resources\Admin\HarcamalarResource;
use App\Models\Harcamalar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HarcamalarApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('harcamalar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HarcamalarResource(Harcamalar::with(['harcama_kategori', 'borc_sec', 'cari_sec', 'birim_sec', 'kasa_sec'])->get());
    }

    public function store(StoreHarcamalarRequest $request)
    {
        $harcamalar = Harcamalar::create($request->all());

        return (new HarcamalarResource($harcamalar))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Harcamalar $harcamalar)
    {
        abort_if(Gate::denies('harcamalar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HarcamalarResource($harcamalar->load(['harcama_kategori', 'borc_sec', 'cari_sec', 'birim_sec', 'kasa_sec']));
    }

    public function update(UpdateHarcamalarRequest $request, Harcamalar $harcamalar)
    {
        $harcamalar->update($request->all());

        return (new HarcamalarResource($harcamalar))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Harcamalar $harcamalar)
    {
        abort_if(Gate::denies('harcamalar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcamalar->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
