@can('borclar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.borclars.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.borclar.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.borclar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-cariSecBorclars">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.borclar.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.borclar.fields.cari_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.borclar.fields.evsahibi_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.borclar.fields.personel_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.borclar.fields.borc_aciklama') }}
                        </th>
                        <th>
                            {{ trans('cruds.borclar.fields.tutar') }}
                        </th>
                        <th>
                            {{ trans('cruds.borclar.fields.birim_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.borclar.fields.not') }}
                        </th>
                        <th>
                            {{ trans('cruds.borclar.fields.odeme_tarihi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borclars as $key => $borclar)
                        <tr data-entry-id="{{ $borclar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $borclar->id ?? '' }}
                            </td>
                            <td>
                                {{ $borclar->cari_sec->cari_adi ?? '' }}
                            </td>
                            <td>
                                {{ $borclar->evsahibi_sec->evsahibi_adi ?? '' }}
                            </td>
                            <td>
                                {{ $borclar->personel_sec->name ?? '' }}
                            </td>
                            <td>
                                {{ $borclar->borc_aciklama ?? '' }}
                            </td>
                            <td>
                                {{ $borclar->tutar ?? '' }}
                            </td>
                            <td>
                                {{ $borclar->birim_sec->birim ?? '' }}
                            </td>
                            <td>
                                {{ $borclar->not ?? '' }}
                            </td>
                            <td>
                                {{ $borclar->odeme_tarihi ?? '' }}
                            </td>
                            <td>
                                @can('borclar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.borclars.show', $borclar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('borclar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.borclars.edit', $borclar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('borclar_delete')
                                    <form action="{{ route('admin.borclars.destroy', $borclar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('borclar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.borclars.massDestroy') }}",
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
  let table = $('.datatable-cariSecBorclars:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection