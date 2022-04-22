@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#personel_sec_borclars" role="tab" data-toggle="tab">
                {{ trans('cruds.borclar.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#personel_sec_diger_tahsilats" role="tab" data-toggle="tab">
                {{ trans('cruds.digerTahsilat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#personel_sec_personel_odemeleris" role="tab" data-toggle="tab">
                {{ trans('cruds.personelOdemeleri.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="personel_sec_borclars">
            @includeIf('admin.users.relationships.personelSecBorclars', ['borclars' => $user->personelSecBorclars])
        </div>
        <div class="tab-pane" role="tabpanel" id="personel_sec_diger_tahsilats">
            @includeIf('admin.users.relationships.personelSecDigerTahsilats', ['digerTahsilats' => $user->personelSecDigerTahsilats])
        </div>
        <div class="tab-pane" role="tabpanel" id="personel_sec_personel_odemeleris">
            @includeIf('admin.users.relationships.personelSecPersonelOdemeleris', ['personelOdemeleris' => $user->personelSecPersonelOdemeleris])
        </div>
    </div>
</div>

@endsection