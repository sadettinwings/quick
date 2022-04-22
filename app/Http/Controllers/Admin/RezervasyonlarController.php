<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRezervasyonlarRequest;
use App\Http\Requests\StoreRezervasyonlarRequest;
use App\Http\Requests\UpdateRezervasyonlarRequest;
use App\Models\Rezervasyonlar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RezervasyonlarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rezervasyonlar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonlars = Rezervasyonlar::all();

        return view('admin.rezervasyonlars.index', compact('rezervasyonlars'));
    }

    public function create()
    {
        abort_if(Gate::denies('rezervasyonlar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rezervasyonlars.create');
    }

    public function store(StoreRezervasyonlarRequest $request)
    {
        $rezervasyonlar = Rezervasyonlar::create($request->all());

        return redirect()->route('admin.rezervasyonlars.index');
    }

    public function edit(Rezervasyonlar $rezervasyonlar)
    {
        abort_if(Gate::denies('rezervasyonlar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rezervasyonlars.edit', compact('rezervasyonlar'));
    }

    public function update(UpdateRezervasyonlarRequest $request, Rezervasyonlar $rezervasyonlar)
    {
        $rezervasyonlar->update($request->all());

        return redirect()->route('admin.rezervasyonlars.index');
    }

    public function show(Rezervasyonlar $rezervasyonlar)
    {
        abort_if(Gate::denies('rezervasyonlar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonlar->load('rezervasyonSecRezervasyonTahsilats', 'rezervasyonSecTesisOdemeleris', 'rezervasyonSecRezervasyonOdemeleris');

        return view('admin.rezervasyonlars.show', compact('rezervasyonlar'));
    }

    public function destroy(Rezervasyonlar $rezervasyonlar)
    {
        abort_if(Gate::denies('rezervasyonlar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonlar->delete();

        return back();
    }

    public function massDestroy(MassDestroyRezervasyonlarRequest $request)
    {
        Rezervasyonlar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
