<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRezervasyonTahsilatRequest;
use App\Http\Requests\StoreRezervasyonTahsilatRequest;
use App\Http\Requests\UpdateRezervasyonTahsilatRequest;
use App\Models\Kasalar;
use App\Models\Musteriler;
use App\Models\Parabirimi;
use App\Models\Rezervasyonlar;
use App\Models\RezervasyonTahsilat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RezervasyonTahsilatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rezervasyon_tahsilat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonTahsilats = RezervasyonTahsilat::with(['musteri_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec'])->get();

        $musterilers = Musteriler::get();

        $rezervasyonlars = Rezervasyonlar::get();

        $kasalars = Kasalar::get();

        $parabirimis = Parabirimi::get();

        return view('admin.rezervasyonTahsilats.index', compact('kasalars', 'musterilers', 'parabirimis', 'rezervasyonTahsilats', 'rezervasyonlars'));
    }

    public function create()
    {
        abort_if(Gate::denies('rezervasyon_tahsilat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_secs = Musteriler::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rezervasyon_secs = Rezervasyonlar::pluck('rezervarsyon_kodu', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rezervasyonTahsilats.create', compact('birim_secs', 'kasa_secs', 'musteri_secs', 'rezervasyon_secs'));
    }

    public function store(StoreRezervasyonTahsilatRequest $request)
    {
        $rezervasyonTahsilat = RezervasyonTahsilat::create($request->all());

        return redirect()->route('admin.rezervasyon-tahsilats.index');
    }

    public function edit(RezervasyonTahsilat $rezervasyonTahsilat)
    {
        abort_if(Gate::denies('rezervasyon_tahsilat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_secs = Musteriler::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rezervasyon_secs = Rezervasyonlar::pluck('rezervarsyon_kodu', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rezervasyonTahsilat->load('musteri_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec');

        return view('admin.rezervasyonTahsilats.edit', compact('birim_secs', 'kasa_secs', 'musteri_secs', 'rezervasyonTahsilat', 'rezervasyon_secs'));
    }

    public function update(UpdateRezervasyonTahsilatRequest $request, RezervasyonTahsilat $rezervasyonTahsilat)
    {
        $rezervasyonTahsilat->update($request->all());

        return redirect()->route('admin.rezervasyon-tahsilats.index');
    }

    public function show(RezervasyonTahsilat $rezervasyonTahsilat)
    {
        abort_if(Gate::denies('rezervasyon_tahsilat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonTahsilat->load('musteri_sec', 'rezervasyon_sec', 'kasa_sec', 'birim_sec');

        return view('admin.rezervasyonTahsilats.show', compact('rezervasyonTahsilat'));
    }

    public function destroy(RezervasyonTahsilat $rezervasyonTahsilat)
    {
        abort_if(Gate::denies('rezervasyon_tahsilat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rezervasyonTahsilat->delete();

        return back();
    }

    public function massDestroy(MassDestroyRezervasyonTahsilatRequest $request)
    {
        RezervasyonTahsilat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
