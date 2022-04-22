@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.alacaklar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.alacaklars.update", [$alacaklar->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="musteri_sec_id">{{ trans('cruds.alacaklar.fields.musteri_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('musteri_sec') ? 'is-invalid' : '' }}" name="musteri_sec_id" id="musteri_sec_id">
                    @foreach($musteri_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('musteri_sec_id') ? old('musteri_sec_id') : $alacaklar->musteri_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('musteri_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('musteri_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alacaklar.fields.musteri_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tesis_sec_id">{{ trans('cruds.alacaklar.fields.tesis_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('tesis_sec') ? 'is-invalid' : '' }}" name="tesis_sec_id" id="tesis_sec_id">
                    @foreach($tesis_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('tesis_sec_id') ? old('tesis_sec_id') : $alacaklar->tesis_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tesis_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tesis_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alacaklar.fields.tesis_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cari_sec_id">{{ trans('cruds.alacaklar.fields.cari_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('cari_sec') ? 'is-invalid' : '' }}" name="cari_sec_id" id="cari_sec_id">
                    @foreach($cari_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cari_sec_id') ? old('cari_sec_id') : $alacaklar->cari_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cari_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cari_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alacaklar.fields.cari_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tutar">{{ trans('cruds.alacaklar.fields.tutar') }}</label>
                <input class="form-control {{ $errors->has('tutar') ? 'is-invalid' : '' }}" type="number" name="tutar" id="tutar" value="{{ old('tutar', $alacaklar->tutar) }}" step="1">
                @if($errors->has('tutar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tutar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alacaklar.fields.tutar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birim_sec_id">{{ trans('cruds.alacaklar.fields.birim_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('birim_sec') ? 'is-invalid' : '' }}" name="birim_sec_id" id="birim_sec_id">
                    @foreach($birim_secs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('birim_sec_id') ? old('birim_sec_id') : $alacaklar->birim_sec->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('birim_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birim_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alacaklar.fields.birim_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="aciklama">{{ trans('cruds.alacaklar.fields.aciklama') }}</label>
                <textarea class="form-control {{ $errors->has('aciklama') ? 'is-invalid' : '' }}" name="aciklama" id="aciklama">{{ old('aciklama', $alacaklar->aciklama) }}</textarea>
                @if($errors->has('aciklama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aciklama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alacaklar.fields.aciklama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="odeme_tarihi">{{ trans('cruds.alacaklar.fields.odeme_tarihi') }}</label>
                <input class="form-control date {{ $errors->has('odeme_tarihi') ? 'is-invalid' : '' }}" type="text" name="odeme_tarihi" id="odeme_tarihi" value="{{ old('odeme_tarihi', $alacaklar->odeme_tarihi) }}">
                @if($errors->has('odeme_tarihi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('odeme_tarihi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alacaklar.fields.odeme_tarihi_helper') }}</span>
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