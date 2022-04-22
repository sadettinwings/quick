@can('harcamalar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.harcamalars.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.harcamalar.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.harcamalar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-borcSecHarcamalars">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.harcamalar.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.harcamalar.fields.harcama_kategori') }}
                        </th>
                        <th>
                            {{ trans('cruds.harcamalar.fields.borc_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.harcamalar.fields.cari_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.harcamalar.fields.tutar') }}
                        </th>
                        <th>
                            {{ trans('cruds.harcamalar.fields.birim_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.harcamalar.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.harcamalar.fields.kasa_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.harcamalar.fields.aciklama') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($harcamalars as $key => $harcamalar)
                        <tr data-entry-id="{{ $harcamalar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $harcamalar->id ?? '' }}
                            </td>
                            <td>
                                {{ $harcamalar->harcama_kategori->hkategori ?? '' }}
                            </td>
                            <td>
                                {{ $harcamalar->borc_sec->borc_aciklama ?? '' }}
                            </td>
                            <td>
                                {{ $harcamalar->cari_sec->cari_adi ?? '' }}
                            </td>
                            <td>
                                {{ $harcamalar->tutar ?? '' }}
                            </td>
                            <td>
                                {{ $harcamalar->birim_sec->birim ?? '' }}
                            </td>
                            <td>
                                {{ $harcamalar->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $harcamalar->kasa_sec->kasa_adi ?? '' }}
                            </td>
                            <td>
                                {{ $harcamalar->aciklama ?? '' }}
                            </td>
                            <td>
                                @can('harcamalar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.harcamalars.show', $harcamalar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('harcamalar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.harcamalars.edit', $harcamalar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('harcamalar_delete')
                                    <form action="{{ route('admin.harcamalars.destroy', $harcamalar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('harcamalar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.harcamalars.massDestroy') }}",
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
  let table = $('.datatable-borcSecHarcamalars:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection