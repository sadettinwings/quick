@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rezervasyonTahsilat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rezervasyon-tahsilats.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="musteri_sec_id">{{ trans('cruds.rezervasyonTahsilat.fields.musteri_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('musteri_sec') ? 'is-invalid' : '' }}" name="musteri_sec_id" id="musteri_sec_id">
                    @foreach($musteri_secs as $id => $entry)
                        <option value="{{ $id }}" {{ old('musteri_sec_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('musteri_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('musteri_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rezervasyonTahsilat.fields.musteri_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rezervasyon_sec_id">{{ trans('cruds.rezervasyonTahsilat.fields.rezervasyon_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('rezervasyon_sec') ? 'is-invalid' : '' }}" name="rezervasyon_sec_id" id="rezervasyon_sec_id">
                    @foreach($rezervasyon_secs as $id => $entry)
                        <option value="{{ $id }}" {{ old('rezervasyon_sec_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('rezervasyon_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rezervasyon_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rezervasyonTahsilat.fields.rezervasyon_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kasa_sec_id">{{ trans('cruds.rezervasyonTahsilat.fields.kasa_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('kasa_sec') ? 'is-invalid' : '' }}" name="kasa_sec_id" id="kasa_sec_id">
                    @foreach($kasa_secs as $id => $entry)
                        <option value="{{ $id }}" {{ old('kasa_sec_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kasa_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kasa_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rezervasyonTahsilat.fields.kasa_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tutar">{{ trans('cruds.rezervasyonTahsilat.fields.tutar') }}</label>
                <input class="form-control {{ $errors->has('tutar') ? 'is-invalid' : '' }}" type="number" name="tutar" id="tutar" value="{{ old('tutar', '') }}" step="1">
                @if($errors->has('tutar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tutar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rezervasyonTahsilat.fields.tutar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="aciklama">{{ trans('cruds.rezervasyonTahsilat.fields.aciklama') }}</label>
                <textarea class="form-control {{ $errors->has('aciklama') ? 'is-invalid' : '' }}" name="aciklama" id="aciklama">{{ old('aciklama') }}</textarea>
                @if($errors->has('aciklama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aciklama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rezervasyonTahsilat.fields.aciklama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birim_sec_id">{{ trans('cruds.rezervasyonTahsilat.fields.birim_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('birim_sec') ? 'is-invalid' : '' }}" name="birim_sec_id" id="birim_sec_id">
                    @foreach($birim_secs as $id => $entry)
                        <option value="{{ $id }}" {{ old('birim_sec_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('birim_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birim_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rezervasyonTahsilat.fields.birim_sec_helper') }}</span>
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