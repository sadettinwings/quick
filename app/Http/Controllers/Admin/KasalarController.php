<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKasalarRequest;
use App\Http\Requests\StoreKasalarRequest;
use App\Http\Requests\UpdateKasalarRequest;
use App\Models\Kasalar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KasalarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kasalar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kasalars = Kasalar::all();

        return view('admin.kasalars.index', compact('kasalars'));
    }

    public function create()
    {
        abort_if(Gate::denies('kasalar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kasalars.create');
    }

    public function store(StoreKasalarRequest $request)
    {
        $kasalar = Kasalar::create($request->all());

        return redirect()->route('admin.kasalars.index');
    }

    public function edit(Kasalar $kasalar)
    {
        abort_if(Gate::denies('kasalar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kasalars.edit', compact('kasalar'));
    }

    public function update(UpdateKasalarRequest $request, Kasalar $kasalar)
    {
        $kasalar->update($request->all());

        return redirect()->route('admin.kasalars.index');
    }

    public function show(Kasalar $kasalar)
    {
        abort_if(Gate::denies('kasalar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kasalar->load('kasaSecRezervasyonTahsilats', 'kasaSecTesisOdemeleris', 'kasaSecHarcamalars', 'kasaSecPersonelOdemeleris', 'kasaSecRezervasyonOdemeleris');

        return view('admin.kasalars.show', compact('kasalar'));
    }

    public function destroy(Kasalar $kasalar)
    {
        abort_if(Gate::denies('kasalar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kasalar->delete();

        return back();
    }

    public function massDestroy(MassDestroyKasalarRequest $request)
    {
        Kasalar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
