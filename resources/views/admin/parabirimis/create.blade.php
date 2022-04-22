@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.parabirimi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.parabirimis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="birim">{{ trans('cruds.parabirimi.fields.birim') }}</label>
                <input class="form-control {{ $errors->has('birim') ? 'is-invalid' : '' }}" type="text" name="birim" id="birim" value="{{ old('birim', '') }}">
                @if($errors->has('birim'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birim') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.parabirimi.fields.birim_helper') }}</span>
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