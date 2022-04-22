@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cariler.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carilers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cariler.fields.id') }}
                        </th>
                        <td>
                            {{ $cariler->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cariler.fields.cari_adi') }}
                        </th>
                        <td>
                            {{ $cariler->cari_adi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carilers.index') }}">
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
            <a class="nav-link" href="#cari_sec_borclars" role="tab" data-toggle="tab">
                {{ trans('cruds.borclar.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cari_sec_diger_tahsilats" role="tab" data-toggle="tab">
                {{ trans('cruds.digerTahsilat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cari_sec_harcamalars" role="tab" data-toggle="tab">
                {{ trans('cruds.harcamalar.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cari_sec_alacaklars" role="tab" data-toggle="tab">
                {{ trans('cruds.alacaklar.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="cari_sec_borclars">
            @includeIf('admin.carilers.relationships.cariSecBorclars', ['borclars' => $cariler->cariSecBorclars])
        </div>
        <div class="tab-pane" role="tabpanel" id="cari_sec_diger_tahsilats">
            @includeIf('admin.carilers.relationships.cariSecDigerTahsilats', ['digerTahsilats' => $cariler->cariSecDigerTahsilats])
        </div>
        <div class="tab-pane" role="tabpanel" id="cari_sec_harcamalars">
            @includeIf('admin.carilers.relationships.cariSecHarcamalars', ['harcamalars' => $cariler->cariSecHarcamalars])
        </div>
        <div class="tab-pane" role="tabpanel" id="cari_sec_alacaklars">
            @includeIf('admin.carilers.relationships.cariSecAlacaklars', ['alacaklars' => $cariler->cariSecAlacaklars])
        </div>
    </div>
</div>

@endsection