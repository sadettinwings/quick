@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.harcamaKategorileri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.harcama-kategorileris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="hkategori">{{ trans('cruds.harcamaKategorileri.fields.hkategori') }}</label>
                <input class="form-control {{ $errors->has('hkategori') ? 'is-invalid' : '' }}" type="text" name="hkategori" id="hkategori" value="{{ old('hkategori', '') }}">
                @if($errors->has('hkategori'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hkategori') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.harcamaKategorileri.fields.hkategori_helper') }}</span>
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