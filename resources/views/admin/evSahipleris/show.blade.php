@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.evSahipleri.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ev-sahipleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.evSahipleri.fields.id') }}
                        </th>
                        <td>
                            {{ $evSahipleri->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.evSahipleri.fields.evsahibi_adi') }}
                        </th>
                        <td>
                            {{ $evSahipleri->evsahibi_adi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ev-sahipleris.index') }}">
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
            <a class="nav-link" href="#evsahibi_sec_borclars" role="tab" data-toggle="tab">
                {{ trans('cruds.borclar.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tesis_sec_tesis_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.tesisOdemeleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tesis_sec_alacaklars" role="tab" data-toggle="tab">
                {{ trans('cruds.alacaklar.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="evsahibi_sec_borclars">
            @includeIf('admin.evSahipleris.relationships.evsahibiSecBorclars', ['borclars' => $evSahipleri->evsahibiSecBorclars])
        </div>
        <div class="tab-pane" role="tabpanel" id="tesis_sec_tesis_odemeleris">
            @includeIf('admin.evSahipleris.relationships.tesisSecTesisOdemeleris', ['tesisOdemeleris' => $evSahipleri->tesisSecTesisOdemeleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="tesis_sec_alacaklars">
            @includeIf('admin.evSahipleris.relationships.tesisSecAlacaklars', ['alacaklars' => $evSahipleri->tesisSecAlacaklars])
        </div>
    </div>
</div>

@endsection