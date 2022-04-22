<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRezervasyonOdemeleriRequest;
use App\Http\Requests\UpdateRezervasyonOdemeleriRequest;
use App\Http\Resources\Admin\RezervasyonOdemeleriResource;
use App\Models\RezervasyonOdemeleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RezervasyonOdemeleriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rezervasyon_odemeleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RezervasyonOdemeleriResource(RezervasyonOdemeleri::with(['musteri_sec', 'rezervasyon_sec', 'birim_sec', 'kasa_sec'])->get());
    }

    public function store(StoreRezervasyonOdemeleriRequest $request)
    {
        $rezervasyonOdemeleri = RezervasyonOdemeleri::create($request->all());

        return (new RezervasyonOdemeleriResource($rezervasyonOdemeleri))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RezervasyonOdemeleri $rezervasyonOdemeleri)
    {
        abort_if(Gate::denies('rezervasyon_odemeleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RezervasyonOdemeleriResource($rezervasyonOdemeleri->load(['musteri_sec', 'rezervasyon_sec', 'birim_sec', 'kasa_sec']));
    }

    public function update(UpdateRezervasyonOdemeleriRequest $request, RezervasyonOdemeleri $rezervasyonOdemeleri)
    {
        $rezervasyonOdemeleri->update($request->all());

        return (new RezervasyonOdemeleriResource($rezervasyonOdemeleri))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RezervasyonOdemeleri $rezervasyonOdemeleri)
    {
        abort_if(Gate::denies('rezervasyon_odemeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonOdemeleri->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
