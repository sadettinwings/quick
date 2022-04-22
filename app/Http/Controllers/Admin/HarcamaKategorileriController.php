<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHarcamaKategorileriRequest;
use App\Http\Requests\StoreHarcamaKategorileriRequest;
use App\Http\Requests\UpdateHarcamaKategorileriRequest;
use App\Models\HarcamaKategorileri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HarcamaKategorileriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('harcama_kategorileri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcamaKategorileris = HarcamaKategorileri::all();

        return view('admin.harcamaKategorileris.index', compact('harcamaKategorileris'));
    }

    public function create()
    {
        abort_if(Gate::denies('harcama_kategorileri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harcamaKategorileris.create');
    }

    public function store(StoreHarcamaKategorileriRequest $request)
    {
        $harcamaKategorileri = HarcamaKategorileri::create($request->all());

        return redirect()->route('admin.harcama-kategorileris.index');
    }

    public function edit(HarcamaKategorileri $harcamaKategorileri)
    {
        abort_if(Gate::denies('harcama_kategorileri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harcamaKategorileris.edit', compact('harcamaKategorileri'));
    }

    public function update(UpdateHarcamaKategorileriRequest $request, HarcamaKategorileri $harcamaKategorileri)
    {
        $harcamaKategorileri->update($request->all());

        return redirect()->route('admin.harcama-kategorileris.index');
    }

    public function show(HarcamaKategorileri $harcamaKategorileri)
    {
        abort_if(Gate::denies('harcama_kategorileri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcamaKategorileri->load('harcamaKategoriHarcamalars');

        return view('admin.harcamaKategorileris.show', compact('harcamaKategorileri'));
    }

    public function destroy(HarcamaKategorileri $harcamaKategorileri)
    {
        abort_if(Gate::denies('harcama_kategorileri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcamaKategorileri->delete();

        return back();
    }

    public function massDestroy(MassDestroyHarcamaKategorileriRequest $request)
    {
        HarcamaKategorileri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
