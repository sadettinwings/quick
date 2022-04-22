@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cariler.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carilers.update", [$cariler->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="cari_adi">{{ trans('cruds.cariler.fields.cari_adi') }}</label>
                <input class="form-control {{ $errors->has('cari_adi') ? 'is-invalid' : '' }}" type="text" name="cari_adi" id="cari_adi" value="{{ old('cari_adi', $cariler->cari_adi) }}">
                @if($errors->has('cari_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cari_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cariler.fields.cari_adi_helper') }}</span>
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