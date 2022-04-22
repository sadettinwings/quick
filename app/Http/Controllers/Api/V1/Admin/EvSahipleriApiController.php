<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEvSahipleriRequest;
use App\Http\Requests\UpdateEvSahipleriRequest;
use App\Http\Resources\Admin\EvSahipleriResource;
use App\Models\EvSahipleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EvSahipleriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ev_sahipleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EvSahipleriResource(EvSahipleri::all());
    }

    public function store(StoreEvSahipleriRequest $request)
    {
        $evSahipleri = EvSahipleri::create($request->all());

        return (new EvSahipleriResource($evSahipleri))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EvSahipleri $evSahipleri)
    {
        abort_if(Gate::denies('ev_sahipleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EvSahipleriResource($evSahipleri);
    }

    public function update(UpdateEvSahipleriRequest $request, EvSahipleri $evSahipleri)
    {
        $evSahipleri->update($request->all());

        return (new EvSahipleriResource($evSahipleri))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EvSahipleri $evSahipleri)
    {
        abort_if(Gate::denies('ev_sahipleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evSahipleri->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
