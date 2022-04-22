@can('havale_onay_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.havale-onays.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.havaleOnay.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.havaleOnay.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-bankaSecHavaleOnays">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.havaleOnay.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.havaleOnay.fields.rezervasyon_kodu') }}
                        </th>
                        <th>
                            {{ trans('cruds.havaleOnay.fields.banka_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.havaleOnay.fields.tutar') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($havaleOnays as $key => $havaleOnay)
                        <tr data-entry-id="{{ $havaleOnay->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $havaleOnay->id ?? '' }}
                            </td>
                            <td>
                                {{ $havaleOnay->rezervasyon_kodu ?? '' }}
                            </td>
                            <td>
                                {{ $havaleOnay->banka_sec->banka_adi ?? '' }}
                            </td>
                            <td>
                                {{ $havaleOnay->tutar ?? '' }}
                            </td>
                            <td>
                                @can('havale_onay_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.havale-onays.show', $havaleOnay->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('havale_onay_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.havale-onays.edit', $havaleOnay->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('havale_onay_delete')
                                    <form action="{{ route('admin.havale-onays.destroy', $havaleOnay->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('havale_onay_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.havale-onays.massDestroy') }}",
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
  let table = $('.datatable-bankaSecHavaleOnays:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection