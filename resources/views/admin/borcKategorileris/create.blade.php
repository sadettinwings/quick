@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.borcKategorileri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.borc-kategorileris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bkategori_adi">{{ trans('cruds.borcKategorileri.fields.bkategori_adi') }}</label>
                <input class="form-control {{ $errors->has('bkategori_adi') ? 'is-invalid' : '' }}" type="text" name="bkategori_adi" id="bkategori_adi" value="{{ old('bkategori_adi', '') }}">
                @if($errors->has('bkategori_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bkategori_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.borcKategorileri.fields.bkategori_adi_helper') }}</span>
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