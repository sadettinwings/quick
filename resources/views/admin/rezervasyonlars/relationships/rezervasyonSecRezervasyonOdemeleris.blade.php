@can('rezervasyon_odemeleri_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.rezervasyon-odemeleris.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.rezervasyonOdemeleri.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.rezervasyonOdemeleri.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-rezervasyonSecRezervasyonOdemeleris">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.musteri_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.rezervasyon_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.tutar') }}
                        </th>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.aciklama') }}
                        </th>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.birim_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.rezervasyonOdemeleri.fields.kasa_sec') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rezervasyonOdemeleris as $key => $rezervasyonOdemeleri)
                        <tr data-entry-id="{{ $rezervasyonOdemeleri->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $rezervasyonOdemeleri->id ?? '' }}
                            </td>
                            <td>
                                {{ $rezervasyonOdemeleri->musteri_sec->musteri_adi ?? '' }}
                            </td>
                            <td>
                                {{ $rezervasyonOdemeleri->rezervasyon_sec->rezervarsyon_kodu ?? '' }}
                            </td>
                            <td>
                                {{ $rezervasyonOdemeleri->tutar ?? '' }}
                            </td>
                            <td>
                                {{ $rezervasyonOdemeleri->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $rezervasyonOdemeleri->aciklama ?? '' }}
                            </td>
                            <td>
                                {{ $rezervasyonOdemeleri->birim_sec->birim ?? '' }}
                            </td>
                            <td>
                                {{ $rezervasyonOdemeleri->kasa_sec->kasa_adi ?? '' }}
                            </td>
                            <td>
                                @can('rezervasyon_odemeleri_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.rezervasyon-odemeleris.show', $rezervasyonOdemeleri->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('rezervasyon_odemeleri_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.rezervasyon-odemeleris.edit', $rezervasyonOdemeleri->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('rezervasyon_odemeleri_delete')
                                    <form action="{{ route('admin.rezervasyon-odemeleris.destroy', $rezervasyonOdemeleri->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('rezervasyon_odemeleri_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rezervasyon-odemeleris.massDestroy') }}",
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
  let table = $('.datatable-rezervasyonSecRezervasyonOdemeleris:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection