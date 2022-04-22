@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tahsilatKategorileri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tahsilat-kategorileris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tkategori_adi">{{ trans('cruds.tahsilatKategorileri.fields.tkategori_adi') }}</label>
                <input class="form-control {{ $errors->has('tkategori_adi') ? 'is-invalid' : '' }}" type="text" name="tkategori_adi" id="tkategori_adi" value="{{ old('tkategori_adi', '') }}">
                @if($errors->has('tkategori_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tkategori_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tahsilatKategorileri.fields.tkategori_adi_helper') }}</span>
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