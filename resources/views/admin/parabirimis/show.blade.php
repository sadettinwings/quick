@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.parabirimi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.parabirimis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.parabirimi.fields.id') }}
                        </th>
                        <td>
                            {{ $parabirimi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parabirimi.fields.birim') }}
                        </th>
                        <td>
                            {{ $parabirimi->birim }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.parabirimis.index') }}">
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
            <a class="nav-link" href="#birim_sec_borclars" role="tab" data-toggle="tab">
                {{ trans('cruds.borclar.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#birim_sec_rezervasyon_tahsilats" role="tab" data-toggle="tab">
                {{ trans('cruds.rezervasyonTahsilat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#birim_sec_diger_tahsilats" role="tab" data-toggle="tab">
                {{ trans('cruds.digerTahsilat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#birim_sec_tesis_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.tesisOdemeleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#birim_sec_personel_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.personelOdemeleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#birim_sec_harcamalars" role="tab" data-toggle="tab">
                {{ trans('cruds.harcamalar.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#birim_sec_rezervasyon_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.rezervasyonOdemeleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#birim_sec_alacaklars" role="tab" data-toggle="tab">
                {{ trans('cruds.alacaklar.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="birim_sec_borclars">
            @includeIf('admin.parabirimis.relationships.birimSecBorclars', ['borclars' => $parabirimi->birimSecBorclars])
        </div>
        <div class="tab-pane" role="tabpanel" id="birim_sec_rezervasyon_tahsilats">
            @includeIf('admin.parabirimis.relationships.birimSecRezervasyonTahsilats', ['rezervasyonTahsilats' => $parabirimi->birimSecRezervasyonTahsilats])
        </div>
        <div class="tab-pane" role="tabpanel" id="birim_sec_diger_tahsilats">
            @includeIf('admin.parabirimis.relationships.birimSecDigerTahsilats', ['digerTahsilats' => $parabirimi->birimSecDigerTahsilats])
        </div>
        <div class="tab-pane" role="tabpanel" id="birim_sec_tesis_odemeleris">
            @includeIf('admin.parabirimis.relationships.birimSecTesisOdemeleris', ['tesisOdemeleris' => $parabirimi->birimSecTesisOdemeleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="birim_sec_personel_odemeleris">
            @includeIf('admin.parabirimis.relationships.birimSecPersonelOdemeleris', ['personelOdemeleris' => $parabirimi->birimSecPersonelOdemeleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="birim_sec_harcamalars">
            @includeIf('admin.parabirimis.relationships.birimSecHarcamalars', ['harcamalars' => $parabirimi->birimSecHarcamalars])
        </div>
        <div class="tab-pane" role="tabpanel" id="birim_sec_rezervasyon_odemeleris">
            @includeIf('admin.parabirimis.relationships.birimSecRezervasyonOdemeleris', ['rezervasyonOdemeleris' => $parabirimi->birimSecRezervasyonOdemeleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="birim_sec_alacaklars">
            @includeIf('admin.parabirimis.relationships.birimSecAlacaklars', ['alacaklars' => $parabirimi->birimSecAlacaklars])
        </div>
    </div>
</div>

@endsection