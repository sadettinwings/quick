@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rezervasyonOdemeleri.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rezervasyon-odemeleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.id') }}
                        </th>
                        <td>
                            {{ $rezervasyonOdemeleri->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.musteri_sec') }}
                        </th>
                        <td>
                            {{ $rezervasyonOdemeleri->musteri_sec->musteri_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.rezervasyon_sec') }}
                        </th>
                        <td>
                            {{ $rezervasyonOdemeleri->rezervasyon_sec->rezervarsyon_kodu ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.tutar') }}
                        </th>
                        <td>
                            {{ $rezervasyonOdemeleri->tutar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.tarih') }}
                        </th>
                        <td>
                            {{ $rezervasyonOdemeleri->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.aciklama') }}
                        </th>
                        <td>
                            {{ $rezervasyonOdemeleri->aciklama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.birim_sec') }}
                        </th>
                        <td>
                            {{ $rezervasyonOdemeleri->birim_sec->birim ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.kasa_sec') }}
                        </th>
                        <td>
                            {{ $rezervasyonOdemeleri->kasa_sec->kasa_adi ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rezervasyon-odemeleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection