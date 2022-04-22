<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyParabirimiRequest;
use App\Http\Requests\StoreParabirimiRequest;
use App\Http\Requests\UpdateParabirimiRequest;
use App\Models\Parabirimi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParabirimiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('parabirimi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parabirimis = Parabirimi::all();

        return view('admin.parabirimis.index', compact('parabirimis'));
    }

    public function create()
    {
        abort_if(Gate::denies('parabirimi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.parabirimis.create');
    }

    public function store(StoreParabirimiRequest $request)
    {
        $parabirimi = Parabirimi::create($request->all());

        return redirect()->route('admin.parabirimis.index');
    }

    public function edit(Parabirimi $parabirimi)
    {
        abort_if(Gate::denies('parabirimi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.parabirimis.edit', compact('parabirimi'));
    }

    public function update(UpdateParabirimiRequest $request, Parabirimi $parabirimi)
    {
        $parabirimi->update($request->all());

        return redirect()->route('admin.parabirimis.index');
    }

    public function show(Parabirimi $parabirimi)
    {
        abort_if(Gate::denies('parabirimi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parabirimi->load('birimSecBorclars', 'birimSecRezervasyonTahsilats', 'birimSecDigerTahsilats', 'birimSecTesisOdemeleris', 'birimSecPersonelOdemeleris', 'birimSecHarcamalars', 'birimSecRezervasyonOdemeleris', 'birimSecAlacaklars');

        return view('admin.parabirimis.show', compact('parabirimi'));
    }

    public function destroy(Parabirimi $parabirimi)
    {
        abort_if(Gate::denies('parabirimi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parabirimi->delete();

        return back();
    }

    public function massDestroy(MassDestroyParabirimiRequest $request)
    {
        Parabirimi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
