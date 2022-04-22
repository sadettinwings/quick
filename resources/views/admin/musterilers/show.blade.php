@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.musteriler.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musterilers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.id') }}
                        </th>
                        <td>
                            {{ $musteriler->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriler.fields.musteri_adi') }}
                        </th>
                        <td>
                            {{ $musteriler->musteri_adi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musterilers.index') }}">
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
            <a class="nav-link" href="#musteri_sec_rezervasyon_tahsilats" role="tab" data-toggle="tab">
                {{ trans('cruds.rezervasyonTahsilat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#musteri_sec_diger_tahsilats" role="tab" data-toggle="tab">
                {{ trans('cruds.digerTahsilat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#musteri_sec_rezervasyon_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.rezervasyonOdemeleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#musteri_sec_alacaklars" role="tab" data-toggle="tab">
                {{ trans('cruds.alacaklar.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="musteri_sec_rezervasyon_tahsilats">
            @includeIf('admin.musterilers.relationships.musteriSecRezervasyonTahsilats', ['rezervasyonTahsilats' => $musteriler->musteriSecRezervasyonTahsilats])
        </div>
        <div class="tab-pane" role="tabpanel" id="musteri_sec_diger_tahsilats">
            @includeIf('admin.musterilers.relationships.musteriSecDigerTahsilats', ['digerTahsilats' => $musteriler->musteriSecDigerTahsilats])
        </div>
        <div class="tab-pane" role="tabpanel" id="musteri_sec_rezervasyon_odemeleris">
            @includeIf('admin.musterilers.relationships.musteriSecRezervasyonOdemeleris', ['rezervasyonOdemeleris' => $musteriler->musteriSecRezervasyonOdemeleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="musteri_sec_alacaklars">
            @includeIf('admin.musterilers.relationships.musteriSecAlacaklars', ['alacaklars' => $musteriler->musteriSecAlacaklars])
        </div>
    </div>
</div>

@endsection