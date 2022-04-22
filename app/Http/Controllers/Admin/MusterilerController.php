<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMusterilerRequest;
use App\Http\Requests\StoreMusterilerRequest;
use App\Http\Requests\UpdateMusterilerRequest;
use App\Models\Musteriler;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MusterilerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('musteriler_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musterilers = Musteriler::all();

        return view('admin.musterilers.index', compact('musterilers'));
    }

    public function create()
    {
        abort_if(Gate::denies('musteriler_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musterilers.create');
    }

    public function store(StoreMusterilerRequest $request)
    {
        $musteriler = Musteriler::create($request->all());

        return redirect()->route('admin.musterilers.index');
    }

    public function edit(Musteriler $musteriler)
    {
        abort_if(Gate::denies('musteriler_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musterilers.edit', compact('musteriler'));
    }

    public function update(UpdateMusterilerRequest $request, Musteriler $musteriler)
    {
        $musteriler->update($request->all());

        return redirect()->route('admin.musterilers.index');
    }

    public function show(Musteriler $musteriler)
    {
        abort_if(Gate::denies('musteriler_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriler->load('musteriSecRezervasyonTahsilats', 'musteriSecDigerTahsilats', 'musteriSecRezervasyonOdemeleris', 'musteriSecAlacaklars');

        return view('admin.musterilers.show', compact('musteriler'));
    }

    public function destroy(Musteriler $musteriler)
    {
        abort_if(Gate::denies('musteriler_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriler->delete();

        return back();
    }

    public function massDestroy(MassDestroyMusterilerRequest $request)
    {
        Musteriler::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
