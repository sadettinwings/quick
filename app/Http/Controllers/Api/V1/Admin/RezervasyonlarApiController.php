<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRezervasyonlarRequest;
use App\Http\Requests\UpdateRezervasyonlarRequest;
use App\Http\Resources\Admin\RezervasyonlarResource;
use App\Models\Rezervasyonlar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RezervasyonlarApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rezervasyonlar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RezervasyonlarResource(Rezervasyonlar::all());
    }

    public function store(StoreRezervasyonlarRequest $request)
    {
        $rezervasyonlar = Rezervasyonlar::create($request->all());

        return (new RezervasyonlarResource($rezervasyonlar))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Rezervasyonlar $rezervasyonlar)
    {
        abort_if(Gate::denies('rezervasyonlar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RezervasyonlarResource($rezervasyonlar);
    }

    public function update(UpdateRezervasyonlarRequest $request, Rezervasyonlar $rezervasyonlar)
    {
        $rezervasyonlar->update($request->all());

        return (new RezervasyonlarResource($rezervasyonlar))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Rezervasyonlar $rezervasyonlar)
    {
        abort_if(Gate::denies('rezervasyonlar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonlar->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
