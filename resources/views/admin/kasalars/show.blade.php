@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kasalar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kasalars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kasalar.fields.id') }}
                        </th>
                        <td>
                            {{ $kasalar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasalar.fields.kasa_adi') }}
                        </th>
                        <td>
                            {{ $kasalar->kasa_adi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kasalars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#kasa_sec_rezervasyon_tahsilats" role="tab" data-toggle="tab">
                {{ trans('cruds.rezervasyonTahsilat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#kasa_sec_tesis_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.tesisOdemeleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#kasa_sec_harcamalars" role="tab" data-toggle="tab">
                {{ trans('cruds.harcamalar.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#kasa_sec_personel_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.personelOdemeleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#kasa_sec_rezervasyon_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.rezervasyonOdemeleri.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="kasa_sec_rezervasyon_tahsilats">
            @includeIf('admin.kasalars.relationships.kasaSecRezervasyonTahsilats', ['rezervasyonTahsilats' => $kasalar->kasaSecRezervasyonTahsilats])
        </div>
        <div class="tab-pane" role="tabpanel" id="kasa_sec_tesis_odemeleris">
            @includeIf('admin.kasalars.relationships.kasaSecTesisOdemeleris', ['tesisOdemeleris' => $kasalar->kasaSecTesisOdemeleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="kasa_sec_harcamalars">
            @includeIf('admin.kasalars.relationships.kasaSecHarcamalars', ['harcamalars' => $kasalar->kasaSecHarcamalars])
        </div>
        <div class="tab-pane" role="tabpanel" id="kasa_sec_personel_odemeleris">
            @includeIf('admin.kasalars.relationships.kasaSecPersonelOdemeleris', ['personelOdemeleris' => $kasalar->kasaSecPersonelOdemeleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="kasa_sec_rezervasyon_odemeleris">
            @includeIf('admin.kasalars.relationships.kasaSecRezervasyonOdemeleris', ['rezervasyonOdemeleris' => $kasalar->kasaSecRezervasyonOdemeleris])
        </div>
    </div>
</div>

@endsection