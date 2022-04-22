<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarilerRequest;
use App\Http\Requests\StoreCarilerRequest;
use App\Http\Requests\UpdateCarilerRequest;
use App\Models\Cariler;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarilerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cariler_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carilers = Cariler::all();

        return view('admin.carilers.index', compact('carilers'));
    }

    public function create()
    {
        abort_if(Gate::denies('cariler_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carilers.create');
    }

    public function store(StoreCarilerRequest $request)
    {
        $cariler = Cariler::create($request->all());

        return redirect()->route('admin.carilers.index');
    }

    public function edit(Cariler $cariler)
    {
        abort_if(Gate::denies('cariler_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carilers.edit', compact('cariler'));
    }

    public function update(UpdateCarilerRequest $request, Cariler $cariler)
    {
        $cariler->update($request->all());

        return redirect()->route('admin.carilers.index');
    }

    public function show(Cariler $cariler)
    {
        abort_if(Gate::denies('cariler_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cariler->load('cariSecBorclars', 'cariSecDigerTahsilats', 'cariSecHarcamalars', 'cariSecAlacaklars');

        return view('admin.carilers.show', compact('cariler'));
    }

    public function destroy(Cariler $cariler)
    {
        abort_if(Gate::denies('cariler_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cariler->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarilerRequest $request)
    {
        Cariler::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
