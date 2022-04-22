<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBorcKategorileriRequest;
use App\Http\Requests\StoreBorcKategorileriRequest;
use App\Http\Requests\UpdateBorcKategorileriRequest;
use App\Models\BorcKategorileri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BorcKategorileriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('borc_kategorileri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borcKategorileris = BorcKategorileri::all();

        return view('admin.borcKategorileris.index', compact('borcKategorileris'));
    }

    public function create()
    {
        abort_if(Gate::denies('borc_kategorileri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.borcKategorileris.create');
    }

    public function store(StoreBorcKategorileriRequest $request)
    {
        $borcKategorileri = BorcKategorileri::create($request->all());

        return redirect()->route('admin.borc-kategorileris.index');
    }

    public function edit(BorcKategorileri $borcKategorileri)
    {
        abort_if(Gate::denies('borc_kategorileri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.borcKategorileris.edit', compact('borcKategorileri'));
    }

    public function update(UpdateBorcKategorileriRequest $request, BorcKategorileri $borcKategorileri)
    {
        $borcKategorileri->update($request->all());

        return redirect()->route('admin.borc-kategorileris.index');
    }

    public function show(BorcKategorileri $borcKategorileri)
    {
        abort_if(Gate::denies('borc_kategorileri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borcKategorileri->load('kategoriSecDigerTahsilats');

        return view('admin.borcKategorileris.show', compact('borcKategorileri'));
    }

    public function destroy(BorcKategorileri $borcKategorileri)
    {
        abort_if(Gate::denies('borc_kategorileri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borcKategorileri->delete();

        return back();
    }

    public function massDestroy(MassDestroyBorcKategorileriRequest $request)
    {
        BorcKategorileri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
