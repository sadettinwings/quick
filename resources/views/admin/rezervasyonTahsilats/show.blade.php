@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rezervasyonTahsilat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rezervasyon-tahsilats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonTahsilat.fields.id') }}
                        </th>
                        <td>
                            {{ $rezervasyonTahsilat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonTahsilat.fields.musteri_sec') }}
                        </th>
                        <td>
                            {{ $rezervasyonTahsilat->musteri_sec->musteri_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonTahsilat.fields.rezervasyon_sec') }}
                        </th>
                        <td>
                            {{ $rezervasyonTahsilat->rezervasyon_sec->rezervarsyon_kodu ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonTahsilat.fields.kasa_sec') }}
                        </th>
                        <td>
                            {{ $rezervasyonTahsilat->kasa_sec->kasa_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonTahsilat.fields.tutar') }}
                        </th>
                        <td>
                            {{ $rezervasyonTahsilat->tutar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonTahsilat.fields.aciklama') }}
                        </th>
                        <td>
                            {{ $rezervasyonTahsilat->aciklama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonTahsilat.fields.birim_sec') }}
                        </th>
                        <td>
                            {{ $rezervasyonTahsilat->birim_sec->birim ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rezervasyon-tahsilats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection