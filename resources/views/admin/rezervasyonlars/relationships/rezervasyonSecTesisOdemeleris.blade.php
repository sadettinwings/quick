@can('tesis_odemeleri_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tesis-odemeleris.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tesisOdemeleri.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.tesisOdemeleri.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-rezervasyonSecTesisOdemeleris">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.tesis_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.borc_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.rezervasyon_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.tutar') }}
                        </th>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.kasa_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.birim_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.tesisOdemeleri.fields.aciklama') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tesisOdemeleris as $key => $tesisOdemeleri)
                        <tr data-entry-id="{{ $tesisOdemeleri->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tesisOdemeleri->id ?? '' }}
                            </td>
                            <td>
                                {{ $tesisOdemeleri->tesis_sec->evsahibi_adi ?? '' }}
                            </td>
                            <td>
                                {{ $tesisOdemeleri->borc_sec->borc_aciklama ?? '' }}
                            </td>
                            <td>
                                {{ $tesisOdemeleri->rezervasyon_sec->rezervarsyon_kodu ?? '' }}
                            </td>
                            <td>
                                {{ $tesisOdemeleri->tutar ?? '' }}
                            </td>
                            <td>
                                {{ $tesisOdemeleri->kasa_sec->kasa_adi ?? '' }}
                            </td>
                            <td>
                                {{ $tesisOdemeleri->birim_sec->birim ?? '' }}
                            </td>
                            <td>
                                {{ $tesisOdemeleri->aciklama ?? '' }}
                            </td>
                            <td>
                                @can('tesis_odemeleri_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tesis-odemeleris.show', $tesisOdemeleri->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tesis_odemeleri_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tesis-odemeleris.edit', $tesisOdemeleri->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tesis_odemeleri_delete')
                                    <form action="{{ route('admin.tesis-odemeleris.destroy', $tesisOdemeleri->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tesis_odemeleri_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tesis-odemeleris.massDestroy') }}",
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
  let table = $('.datatable-rezervasyonSecTesisOdemeleris:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection