<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBorcKategorileriRequest;
use App\Http\Requests\UpdateBorcKategorileriRequest;
use App\Http\Resources\Admin\BorcKategorileriResource;
use App\Models\BorcKategorileri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BorcKategorileriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('borc_kategorileri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BorcKategorileriResource(BorcKategorileri::all());
    }

    public function store(StoreBorcKategorileriRequest $request)
    {
        $borcKategorileri = BorcKategorileri::create($request->all());

        return (new BorcKategorileriResource($borcKategorileri))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BorcKategorileri $borcKategorileri)
    {
        abort_if(Gate::denies('borc_kategorileri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BorcKategorileriResource($borcKategorileri);
    }

    public function update(UpdateBorcKategorileriRequest $request, BorcKategorileri $borcKategorileri)
    {
        $borcKategorileri->update($request->all());

        return (new BorcKategorileriResource($borcKategorileri))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BorcKategorileri $borcKategorileri)
    {
        abort_if(Gate::denies('borc_kategorileri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borcKategorileri->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
