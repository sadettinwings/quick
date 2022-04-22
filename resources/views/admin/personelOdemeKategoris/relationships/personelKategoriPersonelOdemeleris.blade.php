@can('personel_odemeleri_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.personel-odemeleris.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.personelOdemeleri.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.personelOdemeleri.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-personelKategoriPersonelOdemeleris">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.personel_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.personel_kategori') }}
                        </th>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.tutar') }}
                        </th>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.birim_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.aciklama') }}
                        </th>
                        <th>
                            {{ trans('cruds.personelOdemeleri.fields.kasa_sec') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personelOdemeleris as $key => $personelOdemeleri)
                        <tr data-entry-id="{{ $personelOdemeleri->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $personelOdemeleri->id ?? '' }}
                            </td>
                            <td>
                                {{ $personelOdemeleri->personel_sec->name ?? '' }}
                            </td>
                            <td>
                                {{ $personelOdemeleri->personel_kategori->pkategori ?? '' }}
                            </td>
                            <td>
                                {{ $personelOdemeleri->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $personelOdemeleri->tutar ?? '' }}
                            </td>
                            <td>
                                {{ $personelOdemeleri->birim_sec->birim ?? '' }}
                            </td>
                            <td>
                                {{ $personelOdemeleri->aciklama ?? '' }}
                            </td>
                            <td>
                                {{ $personelOdemeleri->kasa_sec->kasa_adi ?? '' }}
                            </td>
                            <td>
                                @can('personel_odemeleri_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.personel-odemeleris.show', $personelOdemeleri->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('personel_odemeleri_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.personel-odemeleris.edit', $personelOdemeleri->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('personel_odemeleri_delete')
                                    <form action="{{ route('admin.personel-odemeleris.destroy', $personelOdemeleri->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('personel_odemeleri_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.personel-odemeleris.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-personelKategoriPersonelOdemeleris:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection