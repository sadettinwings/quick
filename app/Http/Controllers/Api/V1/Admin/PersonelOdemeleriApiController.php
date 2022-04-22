<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonelOdemeleriRequest;
use App\Http\Requests\UpdatePersonelOdemeleriRequest;
use App\Http\Resources\Admin\PersonelOdemeleriResource;
use App\Models\PersonelOdemeleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonelOdemeleriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('personel_odemeleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PersonelOdemeleriResource(PersonelOdemeleri::with(['personel_sec', 'personel_kategori', 'birim_sec', 'kasa_sec'])->get());
    }

    public function store(StorePersonelOdemeleriRequest $request)
    {
        $personelOdemeleri = PersonelOdemeleri::create($request->all());

        return (new PersonelOdemeleriResource($personelOdemeleri))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PersonelOdemeleri $personelOdemeleri)
    {
        abort_if(Gate::denies('personel_odemeleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PersonelOdemeleriResource($personelOdemeleri->load(['personel_sec', 'personel_kategori', 'birim_sec', 'kasa_sec']));
    }

    public function update(UpdatePersonelOdemeleriRequest $request, PersonelOdemeleri $personelOdemeleri)
    {
        $personelOdemeleri->update($request->all());

        return (new PersonelOdemeleriResource($personelOdemeleri))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PersonelOdemeleri $personelOdemeleri)
    {
        abort_if(Gate::denies('personel_odemeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personelOdemeleri->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
