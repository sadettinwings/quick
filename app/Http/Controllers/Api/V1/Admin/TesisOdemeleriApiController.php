<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTesisOdemeleriRequest;
use App\Http\Requests\UpdateTesisOdemeleriRequest;
use App\Http\Resources\Admin\TesisOdemeleriResource;
use App\Models\TesisOdemeleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TesisOdemeleriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tesis_odemeleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TesisOdemeleriResource(TesisOdemeleri::with(['tesis_sec', 'borc_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec'])->get());
    }

    public function store(StoreTesisOdemeleriRequest $request)
    {
        $tesisOdemeleri = TesisOdemeleri::create($request->all());

        return (new TesisOdemeleriResource($tesisOdemeleri))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TesisOdemeleri $tesisOdemeleri)
    {
        abort_if(Gate::denies('tesis_odemeleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TesisOdemeleriResource($tesisOdemeleri->load(['tesis_sec', 'borc_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec']));
    }

    public function update(UpdateTesisOdemeleriRequest $request, TesisOdemeleri $tesisOdemeleri)
    {
        $tesisOdemeleri->update($request->all());

        return (new TesisOdemeleriResource($tesisOdemeleri))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TesisOdemeleri $tesisOdemeleri)
    {
        abort_if(Gate::denies('tesis_odemeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tesisOdemeleri->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
