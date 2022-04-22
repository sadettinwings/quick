<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDigerTahsilatRequest;
use App\Http\Requests\UpdateDigerTahsilatRequest;
use App\Http\Resources\Admin\DigerTahsilatResource;
use App\Models\DigerTahsilat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DigerTahsilatApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('diger_tahsilat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DigerTahsilatResource(DigerTahsilat::with(['tkategori_sec', 'kategori_sec', 'personel_sec', 'cari_sec', 'musteri_sec', 'birim_sec'])->get());
    }

    public function store(StoreDigerTahsilatRequest $request)
    {
        $digerTahsilat = DigerTahsilat::create($request->all());

        return (new DigerTahsilatResource($digerTahsilat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DigerTahsilat $digerTahsilat)
    {
        abort_if(Gate::denies('diger_tahsilat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DigerTahsilatResource($digerTahsilat->load(['tkategori_sec', 'kategori_sec', 'personel_sec', 'cari_sec', 'musteri_sec', 'birim_sec']));
    }

    public function update(UpdateDigerTahsilatRequest $request, DigerTahsilat $digerTahsilat)
    {
        $digerTahsilat->update($request->all());

        return (new DigerTahsilatResource($digerTahsilat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DigerTahsilat $digerTahsilat)
    {
        abort_if(Gate::denies('diger_tahsilat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $digerTahsilat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
