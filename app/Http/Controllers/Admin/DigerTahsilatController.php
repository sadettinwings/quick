<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDigerTahsilatRequest;
use App\Http\Requests\StoreDigerTahsilatRequest;
use App\Http\Requests\UpdateDigerTahsilatRequest;
use App\Models\BorcKategorileri;
use App\Models\Cariler;
use App\Models\DigerTahsilat;
use App\Models\Musteriler;
use App\Models\Parabirimi;
use App\Models\TahsilatKategorileri;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DigerTahsilatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('diger_tahsilat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $digerTahsilats = DigerTahsilat::with(['tkategori_sec', 'kategori_sec', 'personel_sec', 'cari_sec', 'musteri_sec', 'birim_sec'])->get();

        $tahsilat_kategorileris = TahsilatKategorileri::get();

        $borc_kategorileris = BorcKategorileri::get();

        $users = User::get();

        $carilers = Cariler::get();

        $musterilers = Musteriler::get();

        $parabirimis = Parabirimi::get();

        return view('admin.digerTahsilats.index', compact('borc_kategorileris', 'carilers', 'digerTahsilats', 'musterilers', 'parabirimis', 'tahsilat_kategorileris', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('diger_tahsilat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tkategori_secs = TahsilatKategorileri::pluck('tkategori_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kategori_secs = BorcKategorileri::pluck('bkategori_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $personel_secs = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cari_secs = Cariler::pluck('cari_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $musteri_secs = Musteriler::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.digerTahsilats.create', compact('birim_secs', 'cari_secs', 'kategori_secs', 'musteri_secs', 'personel_secs', 'tkategori_secs'));
    }

    public function store(StoreDigerTahsilatRequest $request)
    {
        $digerTahsilat = DigerTahsilat::create($request->all());

        return redirect()->route('admin.diger-tahsilats.index');
    }

    public function edit(DigerTahsilat $digerTahsilat)
    {
        abort_if(Gate::denies('diger_tahsilat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tkategori_secs = TahsilatKategorileri::pluck('tkategori_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kategori_secs = BorcKategorileri::pluck('bkategori_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $personel_secs = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cari_secs = Cariler::pluck('cari_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $musteri_secs = Musteriler::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $digerTahsilat->load('tkategori_sec', 'kategori_sec', 'personel_sec', 'cari_sec', 'musteri_sec', 'birim_sec');

        return view('admin.digerTahsilats.edit', compact('birim_secs', 'cari_secs', 'digerTahsilat', 'kategori_secs', 'musteri_secs', 'personel_secs', 'tkategori_secs'));
    }

    public function update(UpdateDigerTahsilatRequest $request, DigerTahsilat $digerTahsilat)
    {
        $digerTahsilat->update($request->all());

        return redirect()->route('admin.diger-tahsilats.index');
    }

    public function show(DigerTahsilat $digerTahsilat)
    {
        abort_if(Gate::denies('diger_tahsilat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $digerTahsilat->load('tkategori_sec', 'kategori_sec', 'personel_sec', 'cari_sec', 'musteri_sec', 'birim_sec');

        return view('admin.digerTahsilats.show', compact('digerTahsilat'));
    }

    public function destroy(DigerTahsilat $digerTahsilat)
    {
        abort_if(Gate::denies('diger_tahsilat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $digerTahsilat->delete();

        return back();
    }

    public function massDestroy(MassDestroyDigerTahsilatRequest $request)
    {
        DigerTahsilat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
