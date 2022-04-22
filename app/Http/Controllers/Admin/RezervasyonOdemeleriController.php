<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRezervasyonOdemeleriRequest;
use App\Http\Requests\StoreRezervasyonOdemeleriRequest;
use App\Http\Requests\UpdateRezervasyonOdemeleriRequest;
use App\Models\Kasalar;
use App\Models\Musteriler;
use App\Models\Parabirimi;
use App\Models\Rezervasyonlar;
use App\Models\RezervasyonOdemeleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RezervasyonOdemeleriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rezervasyon_odemeleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonOdemeleris = RezervasyonOdemeleri::with(['musteri_sec', 'rezervasyon_sec', 'birim_sec', 'kasa_sec'])->get();

        $musterilers = Musteriler::get();

        $rezervasyonlars = Rezervasyonlar::get();

        $parabirimis = Parabirimi::get();

        $kasalars = Kasalar::get();

        return view('admin.rezervasyonOdemeleris.index', compact('kasalars', 'musterilers', 'parabirimis', 'rezervasyonOdemeleris', 'rezervasyonlars'));
    }

    public function create()
    {
        abort_if(Gate::denies('rezervasyon_odemeleri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_secs = Musteriler::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rezervasyon_secs = Rezervasyonlar::pluck('rezervarsyon_kodu', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rezervasyonOdemeleris.create', compact('birim_secs', 'kasa_secs', 'musteri_secs', 'rezervasyon_secs'));
    }

    public function store(StoreRezervasyonOdemeleriRequest $request)
    {
        $rezervasyonOdemeleri = RezervasyonOdemeleri::create($request->all());

        return redirect()->route('admin.rezervasyon-odemeleris.index');
    }

    public function edit(RezervasyonOdemeleri $rezervasyonOdemeleri)
    {
        abort_if(Gate::denies('rezervasyon_odemeleri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_secs = Musteriler::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rezervasyon_secs = Rezervasyonlar::pluck('rezervarsyon_kodu', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rezervasyonOdemeleri->load('musteri_sec', 'rezervasyon_sec', 'birim_sec', 'kasa_sec');

        return view('admin.rezervasyonOdemeleris.edit', compact('birim_secs', 'kasa_secs', 'musteri_secs', 'rezervasyonOdemeleri', 'rezervasyon_secs'));
    }

    public function update(UpdateRezervasyonOdemeleriRequest $request, RezervasyonOdemeleri $rezervasyonOdemeleri)
    {
        $rezervasyonOdemeleri->update($request->all());

        return redirect()->route('admin.rezervasyon-odemeleris.index');
    }

    public function show(RezervasyonOdemeleri $rezervasyonOdemeleri)
    {
        abort_if(Gate::denies('rezervasyon_odemeleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonOdemeleri->load('musteri_sec', 'rezervasyon_sec', 'birim_sec', 'kasa_sec');

        return view('admin.rezervasyonOdemeleris.show', compact('rezervasyonOdemeleri'));
    }

    public function destroy(RezervasyonOdemeleri $rezervasyonOdemeleri)
    {
        abort_if(Gate::denies('rezervasyon_odemeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonOdemeleri->delete();

        return back();
    }

    public function massDestroy(MassDestroyRezervasyonOdemeleriRequest $request)
    {
        RezervasyonOdemeleri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
