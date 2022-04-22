@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.harcamalar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.harcamalars.update", [$harcamalar->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="harcama_kategori_id">{{ trans('cruds.harcamalar.fields.harcama_kategori') }}</label>
                <select class="form-control select2 {{ $errors->has('harcama_kategori') ? 'is-invalid' : '' }}" name="harcama_kategori_id" id="harcama_kategori_id">
                    @foreach($harcama_kategoris as $id => $entry)
                        <option value="{{ $id }}" {{ (old('harcama_kategori_id') ? old('harcama_kategori_id') : $harcamalar->harcama_kategori->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('harcama_kategori'))
                    <div class="invalid-feedback">
                        {{ $errors->first('harcama_kategori') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.harcamalar.fields.harcama_kategori_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="borc_sec_id">{{ trans('cruds.harcamalar.fields.borc_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('borc_sec') ? 'is-invalid' : '' }}" name="borc_sec_id" id="borc_sec_id">
                    @foreach($borc_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('borc_sec_id') ? old('borc_sec_id') : $harcamalar->borc_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('borc_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('borc_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.harcamalar.fields.borc_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cari_sec_id">{{ trans('cruds.harcamalar.fields.cari_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('cari_sec') ? 'is-invalid' : '' }}" name="cari_sec_id" id="cari_sec_id">
                    @foreach($cari_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cari_sec_id') ? old('cari_sec_id') : $harcamalar->cari_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cari_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cari_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.harcamalar.fields.cari_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tutar">{{ trans('cruds.harcamalar.fields.tutar') }}</label>
                <input class="form-control {{ $errors->has('tutar') ? 'is-invalid' : '' }}" type="number" name="tutar" id="tutar" value="{{ old('tutar', $harcamalar->tutar) }}" step="1">
                @if($errors->has('tutar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tutar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.harcamalar.fields.tutar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birim_sec_id">{{ trans('cruds.harcamalar.fields.birim_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('birim_sec') ? 'is-invalid' : '' }}" name="birim_sec_id" id="birim_sec_id">
                    @foreach($birim_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('birim_sec_id') ? old('birim_sec_id') : $harcamalar->birim_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('birim_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birim_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.harcamalar.fields.birim_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tarih">{{ trans('cruds.harcamalar.fields.tarih') }}</label>
                <input class="form-control date {{ $errors->has('tarih') ? 'is-invalid' : '' }}" type="text" name="tarih" id="tarih" value="{{ old('tarih', $harcamalar->tarih) }}">
                @if($errors->has('tarih'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tarih') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.harcamalar.fields.tarih_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kasa_sec_id">{{ trans('cruds.harcamalar.fields.kasa_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('kasa_sec') ? 'is-invalid' : '' }}" name="kasa_sec_id" id="kasa_sec_id">
                    @foreach($kasa_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kasa_sec_id') ? old('kasa_sec_id') : $harcamalar->kasa_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kasa_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kasa_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.harcamalar.fields.kasa_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="aciklama">{{ trans('cruds.harcamalar.fields.aciklama') }}</label>
                <textarea class="form-control {{ $errors->has('aciklama') ? 'is-invalid' : '' }}" name="aciklama" id="aciklama">{{ old('aciklama', $harcamalar->aciklama) }}</textarea>
                @if($errors->has('aciklama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aciklama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.harcamalar.fields.aciklama_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection