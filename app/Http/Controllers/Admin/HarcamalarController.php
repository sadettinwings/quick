<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHarcamalarRequest;
use App\Http\Requests\StoreHarcamalarRequest;
use App\Http\Requests\UpdateHarcamalarRequest;
use App\Models\Borclar;
use App\Models\Cariler;
use App\Models\HarcamaKategorileri;
use App\Models\Harcamalar;
use App\Models\Kasalar;
use App\Models\Parabirimi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HarcamalarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('harcamalar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcamalars = Harcamalar::with(['harcama_kategori', 'borc_sec', 'cari_sec', 'birim_sec', 'kasa_sec'])->get();

        $harcama_kategorileris = HarcamaKategorileri::get();

        $borclars = Borclar::get();

        $carilers = Cariler::get();

        $parabirimis = Parabirimi::get();

        $kasalars = Kasalar::get();

        return view('admin.harcamalars.index', compact('borclars', 'carilers', 'harcama_kategorileris', 'harcamalars', 'kasalars', 'parabirimis'));
    }

    public function create()
    {
        abort_if(Gate::denies('harcamalar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcama_kategoris = HarcamaKategorileri::pluck('hkategori', 'id')->prepend(trans('global.pleaseSelect'), '');

        $borc_secs = Borclar::pluck('borc_aciklama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cari_secs = Cariler::pluck('cari_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.harcamalars.create', compact('birim_secs', 'borc_secs', 'cari_secs', 'harcama_kategoris', 'kasa_secs'));
    }

    public function store(StoreHarcamalarRequest $request)
    {
        $harcamalar = Harcamalar::create($request->all());

        return redirect()->route('admin.harcamalars.index');
    }

    public function edit(Harcamalar $harcamalar)
    {
        abort_if(Gate::denies('harcamalar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcama_kategoris = HarcamaKategorileri::pluck('hkategori', 'id')->prepend(trans('global.pleaseSelect'), '');

        $borc_secs = Borclar::pluck('borc_aciklama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cari_secs = Cariler::pluck('cari_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $harcamalar->load('harcama_kategori', 'borc_sec', 'cari_sec', 'birim_sec', 'kasa_sec');

        return view('admin.harcamalars.edit', compact('birim_secs', 'borc_secs', 'cari_secs', 'harcama_kategoris', 'harcamalar', 'kasa_secs'));
    }

    public function update(UpdateHarcamalarRequest $request, Harcamalar $harcamalar)
    {
        $harcamalar->update($request->all());

        return redirect()->route('admin.harcamalars.index');
    }

    public function show(Harcamalar $harcamalar)
    {
        abort_if(Gate::denies('harcamalar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcamalar->load('harcama_kategori', 'borc_sec', 'cari_sec', 'birim_sec', 'kasa_sec');

        return view('admin.harcamalars.show', compact('harcamalar'));
    }

    public function destroy(Harcamalar $harcamalar)
    {
        abort_if(Gate::denies('harcamalar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harcamalar->delete();

        return back();
    }

    public function massDestroy(MassDestroyHarcamalarRequest $request)
    {
        Harcamalar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
