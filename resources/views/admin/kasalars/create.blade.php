@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.kasalar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kasalars.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kasa_adi">{{ trans('cruds.kasalar.fields.kasa_adi') }}</label>
                <input class="form-control {{ $errors->has('kasa_adi') ? 'is-invalid' : '' }}" type="text" name="kasa_adi" id="kasa_adi" value="{{ old('kasa_adi', '') }}">
                @if($errors->has('kasa_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kasa_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kasalar.fields.kasa_adi_helper') }}</span>
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