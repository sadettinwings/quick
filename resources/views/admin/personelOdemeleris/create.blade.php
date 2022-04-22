@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.personelOdemeleri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.personel-odemeleris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="personel_sec_id">{{ trans('cruds.personelOdemeleri.fields.personel_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('personel_sec') ? 'is-invalid' : '' }}" name="personel_sec_id" id="personel_sec_id">
                    @foreach($personel_secs as $id => $entry)
                        <option value="{{ $id }}" {{ old('personel_sec_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('personel_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('personel_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.personelOdemeleri.fields.personel_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="personel_kategori_id">{{ trans('cruds.personelOdemeleri.fields.personel_kategori') }}</label>
                <select class="form-control select2 {{ $errors->has('personel_kategori') ? 'is-invalid' : '' }}" name="personel_kategori_id" id="personel_kategori_id">
                    @foreach($personel_kategoris as $id => $entry)
                        <option value="{{ $id }}" {{ old('personel_kategori_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('personel_kategori'))
                    <div class="invalid-feedback">
                        {{ $errors->first('personel_kategori') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.personelOdemeleri.fields.personel_kategori_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tarih">{{ trans('cruds.personelOdemeleri.fields.tarih') }}</label>
                <input class="form-control date {{ $errors->has('tarih') ? 'is-invalid' : '' }}" type="text" name="tarih" id="tarih" value="{{ old('tarih') }}">
                @if($errors->has('tarih'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tarih') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.personelOdemeleri.fields.tarih_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tutar">{{ trans('cruds.personelOdemeleri.fields.tutar') }}</label>
                <input class="form-control {{ $errors->has('tutar') ? 'is-invalid' : '' }}" type="number" name="tutar" id="tutar" value="{{ old('tutar', '') }}" step="1">
                @if($errors->has('tutar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tutar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.personelOdemeleri.fields.tutar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birim_sec_id">{{ trans('cruds.personelOdemeleri.fields.birim_sec') }}</label>
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
                <span class="help-block">{{ trans('cruds.personelOdemeleri.fields.birim_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="aciklama">{{ trans('cruds.personelOdemeleri.fields.aciklama') }}</label>
                <textarea class="form-control {{ $errors->has('aciklama') ? 'is-invalid' : '' }}" name="aciklama" id="aciklama">{{ old('aciklama') }}</textarea>
                @if($errors->has('aciklama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aciklama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.personelOdemeleri.fields.aciklama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kasa_sec_id">{{ trans('cruds.personelOdemeleri.fields.kasa_sec') }}</label>
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
                <span class="help-block">{{ trans('cruds.personelOdemeleri.fields.kasa_sec_helper') }}</span>
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