<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParabirimiRequest;
use App\Http\Requests\UpdateParabirimiRequest;
use App\Http\Resources\Admin\ParabirimiResource;
use App\Models\Parabirimi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParabirimiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('parabirimi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParabirimiResource(Parabirimi::all());
    }

    public function store(StoreParabirimiRequest $request)
    {
        $parabirimi = Parabirimi::create($request->all());

        return (new ParabirimiResource($parabirimi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Parabirimi $parabirimi)
    {
        abort_if(Gate::denies('parabirimi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParabirimiResource($parabirimi);
    }

    public function update(UpdateParabirimiRequest $request, Parabirimi $parabirimi)
    {
        $parabirimi->update($request->all());

        return (new ParabirimiResource($parabirimi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Parabirimi $parabirimi)
    {
        abort_if(Gate::denies('parabirimi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parabirimi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
