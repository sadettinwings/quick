<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTahsilatKategorileriRequest;
use App\Http\Requests\UpdateTahsilatKategorileriRequest;
use App\Http\Resources\Admin\TahsilatKategorileriResource;
use App\Models\TahsilatKategorileri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TahsilatKategorileriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tahsilat_kategorileri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TahsilatKategorileriResource(TahsilatKategorileri::all());
    }

    public function store(StoreTahsilatKategorileriRequest $request)
    {
        $tahsilatKategorileri = TahsilatKategorileri::create($request->all());

        return (new TahsilatKategorileriResource($tahsilatKategorileri))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TahsilatKategorileri $tahsilatKategorileri)
    {
        abort_if(Gate::denies('tahsilat_kategorileri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TahsilatKategorileriResource($tahsilatKategorileri);
    }

    public function update(UpdateTahsilatKategorileriRequest $request, TahsilatKategorileri $tahsilatKategorileri)
    {
        $tahsilatKategorileri->update($request->all());

        return (new TahsilatKategorileriResource($tahsilatKategorileri))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TahsilatKategorileri $tahsilatKategorileri)
    {
        abort_if(Gate::denies('tahsilat_kategorileri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tahsilatKategorileri->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
