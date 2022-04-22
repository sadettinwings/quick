<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAlacaklarRequest;
use App\Http\Requests\StoreAlacaklarRequest;
use App\Http\Requests\UpdateAlacaklarRequest;
use App\Models\Alacaklar;
use App\Models\Cariler;
use App\Models\EvSahipleri;
use App\Models\Musteriler;
use App\Models\Parabirimi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlacaklarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('alacaklar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alacaklars = Alacaklar::with(['musteri_sec', 'tesis_sec', 'cari_sec', 'birim_sec'])->get();

        $musterilers = Musteriler::get();

        $ev_sahipleris = EvSahipleri::get();

        $carilers = Cariler::get();

        $parabirimis = Parabirimi::get();

        return view('admin.alacaklars.index', compact('alacaklars', 'carilers', 'ev_sahipleris', 'musterilers', 'parabirimis'));
    }

    public function create()
    {
        abort_if(Gate::denies('alacaklar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_secs = Musteriler::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tesis_secs = EvSahipleri::pluck('evsahibi_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cari_secs = Cariler::pluck('cari_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.alacaklars.create', compact('birim_secs', 'cari_secs', 'musteri_secs', 'tesis_secs'));
    }

    public function store(StoreAlacaklarRequest $request)
    {
        $alacaklar = Alacaklar::create($request->all());

        return redirect()->route('admin.alacaklars.index');
    }

    public function edit(Alacaklar $alacaklar)
    {
        abort_if(Gate::denies('alacaklar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_secs = Musteriler::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tesis_secs = EvSahipleri::pluck('evsahibi_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cari_secs = Cariler::pluck('cari_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alacaklar->load('musteri_sec', 'tesis_sec', 'cari_sec', 'birim_sec');

        return view('admin.alacaklars.edit', compact('alacaklar', 'birim_secs', 'cari_secs', 'musteri_secs', 'tesis_secs'));
    }

    public function update(UpdateAlacaklarRequest $request, Alacaklar $alacaklar)
    {
        $alacaklar->update($request->all());

        return redirect()->route('admin.alacaklars.index');
    }

    public function show(Alacaklar $alacaklar)
    {
        abort_if(Gate::denies('alacaklar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alacaklar->load('musteri_sec', 'tesis_sec', 'cari_sec', 'birim_sec');

        return view('admin.alacaklars.show', compact('alacaklar'));
    }

    public function destroy(Alacaklar $alacaklar)
    {
        abort_if(Gate::denies('alacaklar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alacaklar->delete();

        return back();
    }

    public function massDestroy(MassDestroyAlacaklarRequest $request)
    {
        Alacaklar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
