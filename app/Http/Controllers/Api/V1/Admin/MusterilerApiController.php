<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMusterilerRequest;
use App\Http\Requests\UpdateMusterilerRequest;
use App\Http\Resources\Admin\MusterilerResource;
use App\Models\Musteriler;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MusterilerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('musteriler_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MusterilerResource(Musteriler::all());
    }

    public function store(StoreMusterilerRequest $request)
    {
        $musteriler = Musteriler::create($request->all());

        return (new MusterilerResource($musteriler))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Musteriler $musteriler)
    {
        abort_if(Gate::denies('musteriler_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MusterilerResource($musteriler);
    }

    public function update(UpdateMusterilerRequest $request, Musteriler $musteriler)
    {
        $musteriler->update($request->all());

        return (new MusterilerResource($musteriler))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Musteriler $musteriler)
    {
        abort_if(Gate::denies('musteriler_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriler->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
