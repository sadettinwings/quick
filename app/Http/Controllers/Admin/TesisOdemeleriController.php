<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTesisOdemeleriRequest;
use App\Http\Requests\StoreTesisOdemeleriRequest;
use App\Http\Requests\UpdateTesisOdemeleriRequest;
use App\Models\Borclar;
use App\Models\EvSahipleri;
use App\Models\Kasalar;
use App\Models\Parabirimi;
use App\Models\Rezervasyonlar;
use App\Models\TesisOdemeleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TesisOdemeleriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tesis_odemeleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tesisOdemeleris = TesisOdemeleri::with(['tesis_sec', 'borc_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec'])->get();

        $ev_sahipleris = EvSahipleri::get();

        $borclars = Borclar::get();

        $rezervasyonlars = Rezervasyonlar::get();

        $kasalars = Kasalar::get();

        $parabirimis = Parabirimi::get();

        return view('admin.tesisOdemeleris.index', compact('borclars', 'ev_sahipleris', 'kasalars', 'parabirimis', 'rezervasyonlars', 'tesisOdemeleris'));
    }

    public function create()
    {
        abort_if(Gate::denies('tesis_odemeleri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tesis_secs = EvSahipleri::pluck('evsahibi_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $borc_secs = Borclar::pluck('borc_aciklama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rezervasyon_secs = Rezervasyonlar::pluck('rezervarsyon_kodu', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tesisOdemeleris.create', compact('birim_secs', 'borc_secs', 'kasa_secs', 'rezervasyon_secs', 'tesis_secs'));
    }

    public function store(StoreTesisOdemeleriRequest $request)
    {
        $tesisOdemeleri = TesisOdemeleri::create($request->all());

        return redirect()->route('admin.tesis-odemeleris.index');
    }

    public function edit(TesisOdemeleri $tesisOdemeleri)
    {
        abort_if(Gate::denies('tesis_odemeleri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tesis_secs = EvSahipleri::pluck('evsahibi_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $borc_secs = Borclar::pluck('borc_aciklama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rezervasyon_secs = Rezervasyonlar::pluck('rezervarsyon_kodu', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tesisOdemeleri->load('tesis_sec', 'borc_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec');

        return view('admin.tesisOdemeleris.edit', compact('birim_secs', 'borc_secs', 'kasa_secs', 'rezervasyon_secs', 'tesisOdemeleri', 'tesis_secs'));
    }

    public function update(UpdateTesisOdemeleriRequest $request, TesisOdemeleri $tesisOdemeleri)
    {
        $tesisOdemeleri->update($request->all());

        return redirect()->route('admin.tesis-odemeleris.index');
    }

    public function show(TesisOdemeleri $tesisOdemeleri)
    {
        abort_if(Gate::denies('tesis_odemeleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tesisOdemeleri->load('tesis_sec', 'borc_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec');

        return view('admin.tesisOdemeleris.show', compact('tesisOdemeleri'));
    }

    public function destroy(TesisOdemeleri $tesisOdemeleri)
    {
        abort_if(Gate::denies('tesis_odemeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tesisOdemeleri->delete();

        return back();
    }

    public function massDestroy(MassDestroyTesisOdemeleriRequest $request)
    {
        TesisOdemeleri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
