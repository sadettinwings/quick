<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBorclarRequest;
use App\Http\Requests\StoreBorclarRequest;
use App\Http\Requests\UpdateBorclarRequest;
use App\Models\Borclar;
use App\Models\Cariler;
use App\Models\EvSahipleri;
use App\Models\Parabirimi;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BorclarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('borclar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borclars = Borclar::with(['cari_sec', 'evsahibi_sec', 'personel_sec', 'birim_sec'])->get();

        $carilers = Cariler::get();

        $ev_sahipleris = EvSahipleri::get();

        $users = User::get();

        $parabirimis = Parabirimi::get();

        return view('admin.borclars.index', compact('borclars', 'carilers', 'ev_sahipleris', 'parabirimis', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('borclar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cari_secs = Cariler::pluck('cari_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $evsahibi_secs = EvSahipleri::pluck('evsahibi_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $personel_secs = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.borclars.create', compact('birim_secs', 'cari_secs', 'evsahibi_secs', 'personel_secs'));
    }

    public function store(StoreBorclarRequest $request)
    {
        $borclar = Borclar::create($request->all());

        return redirect()->route('admin.borclars.index');
    }

    public function edit(Borclar $borclar)
    {
        abort_if(Gate::denies('borclar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cari_secs = Cariler::pluck('cari_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $evsahibi_secs = EvSahipleri::pluck('evsahibi_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $personel_secs = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $birim_secs = Parabirimi::pluck('birim', 'id')->prepend(trans('global.pleaseSelect'), '');

        $borclar->load('cari_sec', 'evsahibi_sec', 'personel_sec', 'birim_sec');

        return view('admin.borclars.edit', compact('birim_secs', 'borclar', 'cari_secs', 'evsahibi_secs', 'personel_secs'));
    }

    public function update(UpdateBorclarRequest $request, Borclar $borclar)
    {
        $borclar->update($request->all());

        return redirect()->route('admin.borclars.index');
    }

    public function show(Borclar $borclar)
    {
        abort_if(Gate::denies('borclar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borclar->load('cari_sec', 'evsahibi_sec', 'personel_sec', 'birim_sec', 'borcSecTesisOdemeleris', 'borcSecHarcamalars');

        return view('admin.borclars.show', compact('borclar'));
    }

    public function destroy(Borclar $borclar)
    {
        abort_if(Gate::denies('borclar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borclar->delete();

        return back();
    }

    public function massDestroy(MassDestroyBorclarRequest $request)
    {
        Borclar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
