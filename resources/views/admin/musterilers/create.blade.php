@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.musteriler.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.musterilers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="musteri_adi">{{ trans('cruds.musteriler.fields.musteri_adi') }}</label>
                <input class="form-control {{ $errors->has('musteri_adi') ? 'is-invalid' : '' }}" type="text" name="musteri_adi" id="musteri_adi" value="{{ old('musteri_adi', '') }}">
                @if($errors->has('musteri_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('musteri_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.musteriler.fields.musteri_adi_helper') }}</span>
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