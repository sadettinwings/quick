@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.personelOdemeKategori.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.personel-odeme-kategoris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeKategori.fields.id') }}
                        </th>
                        <td>
                            {{ $personelOdemeKategori->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.personelOdemeKategori.fields.pkategori') }}
                        </th>
                        <td>
                            {{ $personelOdemeKategori->pkategori }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.personel-odeme-kategoris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#personel_kategori_personel_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.personelOdemeleri.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="personel_kategori_personel_odemeleris">
            @includeIf('admin.personelOdemeKategoris.relationships.personelKategoriPersonelOdemeleris', ['personelOdemeleris' => $personelOdemeKategori->personelKategoriPersonelOdemeleris])
        </div>
    </div>
</div>

@endsection