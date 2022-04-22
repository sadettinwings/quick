@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.digerTahsilat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diger-tahsilats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.id') }}
                        </th>
                        <td>
                            {{ $digerTahsilat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.tkategori_sec') }}
                        </th>
                        <td>
                            {{ $digerTahsilat->tkategori_sec->tkategori_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.kategori_sec') }}
                        </th>
                        <td>
                            {{ $digerTahsilat->kategori_sec->bkategori_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.personel_sec') }}
                        </th>
                        <td>
                            {{ $digerTahsilat->personel_sec->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.cari_sec') }}
                        </th>
                        <td>
                            {{ $digerTahsilat->cari_sec->cari_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.musteri_sec') }}
                        </th>
                        <td>
                            {{ $digerTahsilat->musteri_sec->musteri_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.tutar') }}
                        </th>
                        <td>
                            {{ $digerTahsilat->tutar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.birim_sec') }}
                        </th>
                        <td>
                            {{ $digerTahsilat->birim_sec->birim ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diger-tahsilats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection