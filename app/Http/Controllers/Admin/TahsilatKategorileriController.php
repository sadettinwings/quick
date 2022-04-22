<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTahsilatKategorileriRequest;
use App\Http\Requests\StoreTahsilatKategorileriRequest;
use App\Http\Requests\UpdateTahsilatKategorileriRequest;
use App\Models\TahsilatKategorileri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TahsilatKategorileriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tahsilat_kategorileri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tahsilatKategorileris = TahsilatKategorileri::all();

        return view('admin.tahsilatKategorileris.index', compact('tahsilatKategorileris'));
    }

    public function create()
    {
        abort_if(Gate::denies('tahsilat_kategorileri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tahsilatKategorileris.create');
    }

    public function store(StoreTahsilatKategorileriRequest $request)
    {
        $tahsilatKategorileri = TahsilatKategorileri::create($request->all());

        return redirect()->route('admin.tahsilat-kategorileris.index');
    }

    public function edit(TahsilatKategorileri $tahsilatKategorileri)
    {
        abort_if(Gate::denies('tahsilat_kategorileri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tahsilatKategorileris.edit', compact('tahsilatKategorileri'));
    }

    public function update(UpdateTahsilatKategorileriRequest $request, TahsilatKategorileri $tahsilatKategorileri)
    {
        $tahsilatKategorileri->update($request->all());

        return redirect()->route('admin.tahsilat-kategorileris.index');
    }

    public function show(TahsilatKategorileri $tahsilatKategorileri)
    {
        abort_if(Gate::denies('tahsilat_kategorileri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tahsilatKategorileri->load('tkategoriSecDigerTahsilats');

        return view('admin.tahsilatKategorileris.show', compact('tahsilatKategorileri'));
    }

    public function destroy(TahsilatKategorileri $tahsilatKategorileri)
    {
        abort_if(Gate::denies('tahsilat_kategorileri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tahsilatKategorileri->delete();

        return back();
    }

    public function massDestroy(MassDestroyTahsilatKategorileriRequest $request)
    {
        TahsilatKategorileri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
