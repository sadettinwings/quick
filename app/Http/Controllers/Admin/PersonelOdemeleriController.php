<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPersonelOdemeleriRequest;
use App\Http\Requests\StorePersonelOdemeleriRequest;
use App\Http\Requests\UpdatePersonelOdemeleriRequest;
use App\Models\Kasalar;
use App\Models\Parabirimi;
use App\Models\PersonelOdemeKategori;
use App\Models\PersonelOdemeleri;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonelOdemeleriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('personel_odemeleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personelOdemeleris = PersonelOdemeleri::with(['personel_sec', 'personel_kategori', 'birim_sec', 'kasa_sec'])->get();

        $users = User::get();

        $personel_odeme_kategoris = PersonelOdemeKategori::get();

        $parabirimis = Parabirimi::get();

        $kasalars = Kasalar::get();

        return view('admin.personelOdemeleris.index', compact('kasalars', 'parabirimis', 'personelOdemeleris', 'personel_odeme_kategoris', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('personel_odemeleri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personel_secs = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $personel_kategoris = PersonelOdemeKategori::pluck('pkategori', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.personelOdemeleris.create', compact('birim_secs', 'kasa_secs', 'personel_kategoris', 'personel_secs'));
    }

    public function store(StorePersonelOdemeleriRequest $request)
    {
        $personelOdemeleri = PersonelOdemeleri::create($request->all());

        return redirect()->route('admin.personel-odemeleris.index');
    }

    public function edit(PersonelOdemeleri $personelOdemeleri)
    {
        abort_if(Gate::denies('personel_odemeleri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personel_secs = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $personel_kategoris = PersonelOdemeKategori::pluck('pkategori', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasa_secs = Kasalar::pluck('kasa_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $personelOdemeleri->load('personel_sec', 'personel_kategori', 'birim_sec', 'kasa_sec');

        return view('admin.personelOdemeleris.edit', compact('birim_secs', 'kasa_secs', 'personelOdemeleri', 'personel_kategoris', 'personel_secs'));
    }

    public function update(UpdatePersonelOdemeleriRequest $request, PersonelOdemeleri $personelOdemeleri)
    {
        $personelOdemeleri->update($request->all());

        return redirect()->route('admin.personel-odemeleris.index');
    }

    public function show(PersonelOdemeleri $personelOdemeleri)
    {
        abort_if(Gate::denies('personel_odemeleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personelOdemeleri->load('personel_sec', 'personel_kategori', 'birim_sec', 'kasa_sec');

        return view('admin.personelOdemeleris.show', compact('personelOdemeleri'));
    }

    public function destroy(PersonelOdemeleri $personelOdemeleri)
    {
        abort_if(Gate::denies('personel_odemeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personelOdemeleri->delete();

        return back();
    }

    public function massDestroy(MassDestroyPersonelOdemeleriRequest $request)
    {
        PersonelOdemeleri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
