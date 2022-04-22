@extends('layouts.admin')
@section('content')
@can('diger_tahsilat_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.diger-tahsilats.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.digerTahsilat.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.digerTahsilat.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DigerTahsilat">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.tkategori_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.kategori_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.personel_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.cari_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.musteri_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.tutar') }}
                        </th>
                        <th>
                            {{ trans('cruds.digerTahsilat.fields.birim_sec') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($tahsilat_kategorileris as $key => $item)
                                    <option value="{{ $item->tkategori_adi }}">{{ $item->tkategori_adi }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($borc_kategorileris as $key => $item)
                                    <option value="{{ $item->bkategori_adi }}">{{ $item->bkategori_adi }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($carilers as $key => $item)
                                    <option value="{{ $item->cari_adi }}">{{ $item->cari_adi }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($musterilers as $key => $item)
                                    <option value="{{ $item->musteri_adi }}">{{ $item->musteri_adi }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($parabirimis as $key => $item)
                                    <option value="{{ $item->birim }}">{{ $item->birim }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($digerTahsilats as $key => $digerTahsilat)
                        <tr data-entry-id="{{ $digerTahsilat->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $digerTahsilat->id ?? '' }}
                            </td>
                            <td>
                                {{ $digerTahsilat->tkategori_sec->tkategori_adi ?? '' }}
                            </td>
                            <td>
                                {{ $digerTahsilat->kategori_sec->bkategori_adi ?? '' }}
                            </td>
                            <td>
                                {{ $digerTahsilat->personel_sec->name ?? '' }}
                            </td>
                            <td>
                                {{ $digerTahsilat->cari_sec->cari_adi ?? '' }}
                            </td>
                            <td>
                                {{ $digerTahsilat->musteri_sec->musteri_adi ?? '' }}
                            </td>
                            <td>
                                {{ $digerTahsilat->tutar ?? '' }}
                            </td>
                            <td>
                                {{ $digerTahsilat->birim_sec->birim ?? '' }}
                            </td>
                            <td>
                                @can('diger_tahsilat_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.diger-tahsilats.show', $digerTahsilat->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('diger_tahsilat_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.diger-tahsilats.edit', $digerTahsilat->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('diger_tahsilat_delete')
                                    <form action="{{ route('admin.diger-tahsilats.destroy', $digerTahsilat->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('diger_tahsilat_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.diger-tahsilats.massDestroy') }}",
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
  let table = $('.datatable-DigerTahsilat:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection