@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.harcamalar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.harcamalars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.harcamalar.fields.id') }}
                        </th>
                        <td>
                            {{ $harcamalar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.harcamalar.fields.harcama_kategori') }}
                        </th>
                        <td>
                            {{ $harcamalar->harcama_kategori->hkategori ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.harcamalar.fields.borc_sec') }}
                        </th>
                        <td>
                            {{ $harcamalar->borc_sec->borc_aciklama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.harcamalar.fields.cari_sec') }}
                        </th>
                        <td>
                            {{ $harcamalar->cari_sec->cari_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.harcamalar.fields.tutar') }}
                        </th>
                        <td>
                            {{ $harcamalar->tutar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.harcamalar.fields.birim_sec') }}
                        </th>
                        <td>
                            {{ $harcamalar->birim_sec->birim ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.harcamalar.fields.tarih') }}
                        </th>
                        <td>
                            {{ $harcamalar->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.harcamalar.fields.kasa_sec') }}
                        </th>
                        <td>
                            {{ $harcamalar->kasa_sec->kasa_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.harcamalar.fields.aciklama') }}
                        </th>
                        <td>
                            {{ $harcamalar->aciklama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.harcamalars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection