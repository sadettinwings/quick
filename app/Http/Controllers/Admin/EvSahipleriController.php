<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEvSahipleriRequest;
use App\Http\Requests\StoreEvSahipleriRequest;
use App\Http\Requests\UpdateEvSahipleriRequest;
use App\Models\EvSahipleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EvSahipleriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ev_sahipleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evSahipleris = EvSahipleri::all();

        return view('admin.evSahipleris.index', compact('evSahipleris'));
    }

    public function create()
    {
        abort_if(Gate::denies('ev_sahipleri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evSahipleris.create');
    }

    public function store(StoreEvSahipleriRequest $request)
    {
        $evSahipleri = EvSahipleri::create($request->all());

        return redirect()->route('admin.ev-sahipleris.index');
    }

    public function edit(EvSahipleri $evSahipleri)
    {
        abort_if(Gate::denies('ev_sahipleri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.evSahipleris.edit', compact('evSahipleri'));
    }

    public function update(UpdateEvSahipleriRequest $request, EvSahipleri $evSahipleri)
    {
        $evSahipleri->update($request->all());

        return redirect()->route('admin.ev-sahipleris.index');
    }

    public function show(EvSahipleri $evSahipleri)
    {
        abort_if(Gate::denies('ev_sahipleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evSahipleri->load('evsahibiSecBorclars', 'tesisSecTesisOdemeleris', 'tesisSecAlacaklars');

        return view('admin.evSahipleris.show', compact('evSahipleri'));
    }

    public function destroy(EvSahipleri $evSahipleri)
    {
        abort_if(Gate::denies('ev_sahipleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evSahipleri->delete();

        return back();
    }

    public function massDestroy(MassDestroyEvSahipleriRequest $request)
    {
        EvSahipleri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
