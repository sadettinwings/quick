@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.personelOdemeKategori.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.personel-odeme-kategoris.update", [$personelOdemeKategori->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="pkategori">{{ trans('cruds.personelOdemeKategori.fields.pkategori') }}</label>
                <input class="form-control {{ $errors->has('pkategori') ? 'is-invalid' : '' }}" type="text" name="pkategori" id="pkategori" value="{{ old('pkategori', $personelOdemeKategori->pkategori) }}">
                @if($errors->has('pkategori'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pkategori') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.personelOdemeKategori.fields.pkategori_helper') }}</span>
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