@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.borclar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.borclars.update", [$borclar->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="cari_sec_id">{{ trans('cruds.borclar.fields.cari_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('cari_sec') ? 'is-invalid' : '' }}" name="cari_sec_id" id="cari_sec_id">
                    @foreach($cari_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cari_sec_id') ? old('cari_sec_id') : $borclar->cari_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cari_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cari_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.borclar.fields.cari_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="evsahibi_sec_id">{{ trans('cruds.borclar.fields.evsahibi_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('evsahibi_sec') ? 'is-invalid' : '' }}" name="evsahibi_sec_id" id="evsahibi_sec_id">
                    @foreach($evsahibi_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('evsahibi_sec_id') ? old('evsahibi_sec_id') : $borclar->evsahibi_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('evsahibi_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evsahibi_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.borclar.fields.evsahibi_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="personel_sec_id">{{ trans('cruds.borclar.fields.personel_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('personel_sec') ? 'is-invalid' : '' }}" name="personel_sec_id" id="personel_sec_id">
                    @foreach($personel_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('personel_sec_id') ? old('personel_sec_id') : $borclar->personel_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('personel_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('personel_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.borclar.fields.personel_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="borc_aciklama">{{ trans('cruds.borclar.fields.borc_aciklama') }}</label>
                <input class="form-control {{ $errors->has('borc_aciklama') ? 'is-invalid' : '' }}" type="text" name="borc_aciklama" id="borc_aciklama" value="{{ old('borc_aciklama', $borclar->borc_aciklama) }}">
                @if($errors->has('borc_aciklama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('borc_aciklama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.borclar.fields.borc_aciklama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tutar">{{ trans('cruds.borclar.fields.tutar') }}</label>
                <input class="form-control {{ $errors->has('tutar') ? 'is-invalid' : '' }}" type="number" name="tutar" id="tutar" value="{{ old('tutar', $borclar->tutar) }}" step="1">
                @if($errors->has('tutar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tutar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.borclar.fields.tutar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birim_sec_id">{{ trans('cruds.borclar.fields.birim_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('birim_sec') ? 'is-invalid' : '' }}" name="birim_sec_id" id="birim_sec_id">
                    @foreach($birim_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('birim_sec_id') ? old('birim_sec_id') : $borclar->birim_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('birim_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birim_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.borclar.fields.birim_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="not">{{ trans('cruds.borclar.fields.not') }}</label>
                <textarea class="form-control {{ $errors->has('not') ? 'is-invalid' : '' }}" name="not" id="not">{{ old('not', $borclar->not) }}</textarea>
                @if($errors->has('not'))
                    <div class="invalid-feedback">
                        {{ $errors->first('not') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.borclar.fields.not_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="odeme_tarihi">{{ trans('cruds.borclar.fields.odeme_tarihi') }}</label>
                <input class="form-control date {{ $errors->has('odeme_tarihi') ? 'is-invalid' : '' }}" type="text" name="odeme_tarihi" id="odeme_tarihi" value="{{ old('odeme_tarihi', $borclar->odeme_tarihi) }}">
                @if($errors->has('odeme_tarihi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('odeme_tarihi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.borclar.fields.odeme_tarihi_helper') }}</span>
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