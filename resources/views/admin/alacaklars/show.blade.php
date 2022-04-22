@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.alacaklar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alacaklars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.alacaklar.fields.id') }}
                        </th>
                        <td>
                            {{ $alacaklar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alacaklar.fields.musteri_sec') }}
                        </th>
                        <td>
                            {{ $alacaklar->musteri_sec->musteri_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alacaklar.fields.tesis_sec') }}
                        </th>
                        <td>
                            {{ $alacaklar->tesis_sec->evsahibi_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alacaklar.fields.cari_sec') }}
                        </th>
                        <td>
                            {{ $alacaklar->cari_sec->cari_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alacaklar.fields.tutar') }}
                        </th>
                        <td>
                            {{ $alacaklar->tutar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alacaklar.fields.birim_sec') }}
                        </th>
                        <td>
                            {{ $alacaklar->birim_sec->birim ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alacaklar.fields.aciklama') }}
                        </th>
                        <td>
                            {{ $alacaklar->aciklama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alacaklar.fields.odeme_tarihi') }}
                        </th>
                        <td>
                            {{ $alacaklar->odeme_tarihi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alacaklars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection