@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rezervasyonlar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rezervasyonlars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonlar.fields.id') }}
                        </th>
                        <td>
                            {{ $rezervasyonlar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonlar.fields.rezervarsyon_kodu') }}
                        </th>
                        <td>
                            {{ $rezervasyonlar->rezervarsyon_kodu }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rezervasyonlars.index') }}">
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
            <a class="nav-link" href="#rezervasyon_sec_rezervasyon_tahsilats" role="tab" data-toggle="tab">
                {{ trans('cruds.rezervasyonTahsilat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#rezervasyon_sec_tesis_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.tesisOdemeleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#rezervasyon_sec_rezervasyon_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.rezervasyonOdemeleri.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="rezervasyon_sec_rezervasyon_tahsilats">
            @includeIf('admin.rezervasyonlars.relationships.rezervasyonSecRezervasyonTahsilats', ['rezervasyonTahsilats' => $rezervasyonlar->rezervasyonSecRezervasyonTahsilats])
        </div>
        <div class="tab-pane" role="tabpanel" id="rezervasyon_sec_tesis_odemeleris">
            @includeIf('admin.rezervasyonlars.relationships.rezervasyonSecTesisOdemeleris', ['tesisOdemeleris' => $rezervasyonlar->rezervasyonSecTesisOdemeleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="rezervasyon_sec_rezervasyon_odemeleris">
            @includeIf('admin.rezervasyonlars.relationships.rezervasyonSecRezervasyonOdemeleris', ['rezervasyonOdemeleris' => $rezervasyonlar->rezervasyonSecRezervasyonOdemeleris])
        </div>
    </div>
</div>

@endsection