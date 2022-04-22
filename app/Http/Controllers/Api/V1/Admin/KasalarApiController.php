<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKasalarRequest;
use App\Http\Requests\UpdateKasalarRequest;
use App\Http\Resources\Admin\KasalarResource;
use App\Models\Kasalar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KasalarApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kasalar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KasalarResource(Kasalar::all());
    }

    public function store(StoreKasalarRequest $request)
    {
        $kasalar = Kasalar::create($request->all());

        return (new KasalarResource($kasalar))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Kasalar $kasalar)
    {
        abort_if(Gate::denies('kasalar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KasalarResource($kasalar);
    }

    public function update(UpdateKasalarRequest $request, Kasalar $kasalar)
    {
        $kasalar->update($request->all());

        return (new KasalarResource($kasalar))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Kasalar $kasalar)
    {
        abort_if(Gate::denies('kasalar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kasalar->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
