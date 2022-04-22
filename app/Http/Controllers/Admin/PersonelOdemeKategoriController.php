<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPersonelOdemeKategoriRequest;
use App\Http\Requests\StorePersonelOdemeKategoriRequest;
use App\Http\Requests\UpdatePersonelOdemeKategoriRequest;
use App\Models\PersonelOdemeKategori;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonelOdemeKategoriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('personel_odeme_kategori_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personelOdemeKategoris = PersonelOdemeKategori::all();

        return view('admin.personelOdemeKategoris.index', compact('personelOdemeKategoris'));
    }

    public function create()
    {
        abort_if(Gate::denies('personel_odeme_kategori_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.personelOdemeKategoris.create');
    }

    public function store(StorePersonelOdemeKategoriRequest $request)
    {
        $personelOdemeKategori = PersonelOdemeKategori::create($request->all());

        return redirect()->route('admin.personel-odeme-kategoris.index');
    }

    public function edit(PersonelOdemeKategori $personelOdemeKategori)
    {
        abort_if(Gate::denies('personel_odeme_kategori_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.personelOdemeKategoris.edit', compact('personelOdemeKategori'));
    }

    public function update(UpdatePersonelOdemeKategoriRequest $request, PersonelOdemeKategori $personelOdemeKategori)
    {
        $personelOdemeKategori->update($request->all());

        return redirect()->route('admin.personel-odeme-kategoris.index');
    }

    public function show(PersonelOdemeKategori $personelOdemeKategori)
    {
        abort_if(Gate::denies('personel_odeme_kategori_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personelOdemeKategori->load('personelKategoriPersonelOdemeleris');

        return view('admin.personelOdemeKategoris.show', compact('personelOdemeKategori'));
    }

    public function destroy(PersonelOdemeKategori $personelOdemeKategori)
    {
        abort_if(Gate::denies('personel_odeme_kategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $personelOdemeKategori->delete();

        return back();
    }

    public function massDestroy(MassDestroyPersonelOdemeKategoriRequest $request)
    {
        PersonelOdemeKategori::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
