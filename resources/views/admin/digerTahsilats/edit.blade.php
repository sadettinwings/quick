@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.digerTahsilat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.diger-tahsilats.update", [$digerTahsilat->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tkategori_sec_id">{{ trans('cruds.digerTahsilat.fields.tkategori_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('tkategori_sec') ? 'is-invalid' : '' }}" name="tkategori_sec_id" id="tkategori_sec_id">
                    @foreach($tkategori_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('tkategori_sec_id') ? old('tkategori_sec_id') : $digerTahsilat->tkategori_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tkategori_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tkategori_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.digerTahsilat.fields.tkategori_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kategori_sec_id">{{ trans('cruds.digerTahsilat.fields.kategori_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('kategori_sec') ? 'is-invalid' : '' }}" name="kategori_sec_id" id="kategori_sec_id">
                    @foreach($kategori_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kategori_sec_id') ? old('kategori_sec_id') : $digerTahsilat->kategori_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kategori_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kategori_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.digerTahsilat.fields.kategori_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="personel_sec_id">{{ trans('cruds.digerTahsilat.fields.personel_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('personel_sec') ? 'is-invalid' : '' }}" name="personel_sec_id" id="personel_sec_id">
                    @foreach($personel_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('personel_sec_id') ? old('personel_sec_id') : $digerTahsilat->personel_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('personel_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('personel_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.digerTahsilat.fields.personel_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cari_sec_id">{{ trans('cruds.digerTahsilat.fields.cari_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('cari_sec') ? 'is-invalid' : '' }}" name="cari_sec_id" id="cari_sec_id">
                    @foreach($cari_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cari_sec_id') ? old('cari_sec_id') : $digerTahsilat->cari_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cari_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cari_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.digerTahsilat.fields.cari_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="musteri_sec_id">{{ trans('cruds.digerTahsilat.fields.musteri_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('musteri_sec') ? 'is-invalid' : '' }}" name="musteri_sec_id" id="musteri_sec_id">
                    @foreach($musteri_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('musteri_sec_id') ? old('musteri_sec_id') : $digerTahsilat->musteri_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('musteri_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('musteri_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.digerTahsilat.fields.musteri_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tutar">{{ trans('cruds.digerTahsilat.fields.tutar') }}</label>
                <input class="form-control {{ $errors->has('tutar') ? 'is-invalid' : '' }}" type="number" name="tutar" id="tutar" value="{{ old('tutar', $digerTahsilat->tutar) }}" step="1">
                @if($errors->has('tutar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tutar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.digerTahsilat.fields.tutar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birim_sec_id">{{ trans('cruds.digerTahsilat.fields.birim_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('birim_sec') ? 'is-invalid' : '' }}" name="birim_sec_id" id="birim_sec_id">
                    @foreach($birim_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('birim_sec_id') ? old('birim_sec_id') : $digerTahsilat->birim_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('birim_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birim_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.digerTahsilat.fields.birim_sec_helper') }}</span>
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