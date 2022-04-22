@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.borclar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.borclars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.borclar.fields.id') }}
                        </th>
                        <td>
                            {{ $borclar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.borclar.fields.cari_sec') }}
                        </th>
                        <td>
                            {{ $borclar->cari_sec->cari_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.borclar.fields.evsahibi_sec') }}
                        </th>
                        <td>
                            {{ $borclar->evsahibi_sec->evsahibi_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.borclar.fields.personel_sec') }}
                        </th>
                        <td>
                            {{ $borclar->personel_sec->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.borclar.fields.borc_aciklama') }}
                        </th>
                        <td>
                            {{ $borclar->borc_aciklama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.borclar.fields.tutar') }}
                        </th>
                        <td>
                            {{ $borclar->tutar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.borclar.fields.birim_sec') }}
                        </th>
                        <td>
                            {{ $borclar->birim_sec->birim ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.borclar.fields.not') }}
                        </th>
                        <td>
                            {{ $borclar->not }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.borclar.fields.odeme_tarihi') }}
                        </th>
                        <td>
                            {{ $borclar->odeme_tarihi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.borclars.index') }}">
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
            <a class="nav-link" href="#borc_sec_tesis_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.tesisOdemeleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#borc_sec_harcamalars" role="tab" data-toggle="tab">
                {{ trans('cruds.harcamalar.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="borc_sec_tesis_odemeleris">
            @includeIf('admin.borclars.relationships.borcSecTesisOdemeleris', ['tesisOdemeleris' => $borclar->borcSecTesisOdemeleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="borc_sec_harcamalars">
            @includeIf('admin.borclars.relationships.borcSecHarcamalars', ['harcamalars' => $borclar->borcSecHarcamalars])
        </div>
    </div>
</div>

@endsection