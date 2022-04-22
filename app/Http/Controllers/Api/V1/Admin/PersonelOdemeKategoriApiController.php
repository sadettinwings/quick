<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonelOdemeKategoriRequest;
use App\Http\Requests\UpdatePersonelOdemeKategoriRequest;
use App\Http\Resources\Admin\PersonelOdemeKategoriResource;
use App\Models\PersonelOdemeKategori;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonelOdemeKategoriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('personel_odeme_kategori_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PersonelOdemeKategoriResource(PersonelOdemeKategori::all());
    }

    public function store(StorePersonelOdemeKategoriRequest $request)
    {
        $personelOdemeKategori = PersonelOdemeKategori::create($request->all());

        return (new PersonelOdemeKategoriResource($personelOdemeKategori))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PersonelOdemeKategori $personelOdemeKategori)
    {
        abort_if(Gate::denies('personel_odeme_kategori_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PersonelOdemeKategoriResource($personelOdemeKategori);
    }

    public function update(UpdatePersonelOdemeKategoriRequest $request, PersonelOdemeKategori $personelOdemeKategori)
    {
        $personelOdemeKategori->update($request->all());

        return (new PersonelOdemeKategoriResource($personelOdemeKategori))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PersonelOdemeKategori $personelOdemeKategori)
    {
        abort_if(Gate::denies('personel_odeme_kategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personelOdemeKategori->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
