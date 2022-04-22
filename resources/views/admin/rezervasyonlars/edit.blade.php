@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.rezervasyonlar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rezervasyonlars.update", [$rezervasyonlar->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="rezervarsyon_kodu">{{ trans('cruds.rezervasyonlar.fields.rezervarsyon_kodu') }}</label>
                <input class="form-control {{ $errors->has('rezervarsyon_kodu') ? 'is-invalid' : '' }}" type="text" name="rezervarsyon_kodu" id="rezervarsyon_kodu" value="{{ old('rezervarsyon_kodu', $rezervasyonlar->rezervarsyon_kodu) }}">
                @if($errors->has('rezervarsyon_kodu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rezervarsyon_kodu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rezervasyonlar.fields.rezervarsyon_kodu_helper') }}</span>
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