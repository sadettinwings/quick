<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRezervasyonTahsilatRequest;
use App\Http\Requests\UpdateRezervasyonTahsilatRequest;
use App\Http\Resources\Admin\RezervasyonTahsilatResource;
use App\Models\RezervasyonTahsilat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RezervasyonTahsilatApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rezervasyon_tahsilat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RezervasyonTahsilatResource(RezervasyonTahsilat::with(['musteri_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec'])->get());
    }

    public function store(StoreRezervasyonTahsilatRequest $request)
    {
        $rezervasyonTahsilat = RezervasyonTahsilat::create($request->all());

        return (new RezervasyonTahsilatResource($rezervasyonTahsilat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RezervasyonTahsilat $rezervasyonTahsilat)
    {
        abort_if(Gate::denies('rezervasyon_tahsilat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RezervasyonTahsilatResource($rezervasyonTahsilat->load(['musteri_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec']));
    }

    public function update(UpdateRezervasyonTahsilatRequest $request, RezervasyonTahsilat $rezervasyonTahsilat)
    {
        $rezervasyonTahsilat->update($request->all());

        return (new RezervasyonTahsilatResource($rezervasyonTahsilat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RezervasyonTahsilat $rezervasyonTahsilat)
    {
        abort_if(Gate::denies('rezervasyon_tahsilat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonTahsilat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
