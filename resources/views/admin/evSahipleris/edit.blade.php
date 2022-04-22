@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.evSahipleri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ev-sahipleris.update", [$evSahipleri->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="evsahibi_adi">{{ trans('cruds.evSahipleri.fields.evsahibi_adi') }}</label>
                <input class="form-control {{ $errors->has('evsahibi_adi') ? 'is-invalid' : '' }}" type="text" name="evsahibi_adi" id="evsahibi_adi" value="{{ old('evsahibi_adi', $evSahipleri->evsahibi_adi) }}">
                @if($errors->has('evsahibi_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evsahibi_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.evSahipleri.fields.evsahibi_adi_helper') }}</span>
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