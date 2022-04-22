@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.personelOdemeleri.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.personel-odemeleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.id') }}
                        </th>
                        <td>
                            {{ $personelOdemeleri->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.personel_sec') }}
                        </th>
                        <td>
                            {{ $personelOdemeleri->personel_sec->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.personel_kategori') }}
                        </th>
                        <td>
                            {{ $personelOdemeleri->personel_kategori->pkategori ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.tarih') }}
                        </th>
                        <td>
                            {{ $personelOdemeleri->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.tutar') }}
                        </th>
                        <td>
                            {{ $personelOdemeleri->tutar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.birim_sec') }}
                        </th>
                        <td>
                            {{ $personelOdemeleri->birim_sec->birim ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.aciklama') }}
                        </th>
                        <td>
                            {{ $personelOdemeleri->aciklama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.kasa_sec') }}
                        </th>
                        <td>
                            {{ $personelOdemeleri->kasa_sec->kasa_adi ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.personel-odemeleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection