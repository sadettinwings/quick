@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tesisOdemeleri.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tesis-odemeleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.id') }}
                        </th>
                        <td>
                            {{ $tesisOdemeleri->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.tesis_sec') }}
                        </th>
                        <td>
                            {{ $tesisOdemeleri->tesis_sec->evsahibi_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.borc_sec') }}
                        </th>
                        <td>
                            {{ $tesisOdemeleri->borc_sec->borc_aciklama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.rezervasyon_sec') }}
                        </th>
                        <td>
                            {{ $tesisOdemeleri->rezervasyon_sec->rezervarsyon_kodu ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.tutar') }}
                        </th>
                        <td>
                            {{ $tesisOdemeleri->tutar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.kasa_sec') }}
                        </th>
                        <td>
                            {{ $tesisOdemeleri->kasa_sec->kasa_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.birim_sec') }}
                        </th>
                        <td>
                            {{ $tesisOdemeleri->birim_sec->birim ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.aciklama') }}
                        </th>
                        <td>
                            {{ $tesisOdemeleri->aciklama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tesis-odemeleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection