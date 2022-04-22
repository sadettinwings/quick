@extends('layouts.admin')
@section('content')
@can('alacaklar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.alacaklars.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.alacaklar.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.alacaklar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Alacaklar">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.alacaklar.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.alacaklar.fields.musteri_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.alacaklar.fields.tesis_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.alacaklar.fields.cari_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.alacaklar.fields.tutar') }}
                        </th>
                        <th>
                            {{ trans('cruds.alacaklar.fields.birim_sec') }}
                        </th>
                        <th>
                            {{ trans('cruds.alacaklar.fields.aciklama') }}
                        </th>
                        <th>
                            {{ trans('cruds.alacaklar.fields.odeme_tarihi') }}
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
                                @foreach($musterilers as $key => $item)
                                    <option value="{{ $item->musteri_adi }}">{{ $item->musteri_adi }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($ev_sahipleris as $key => $item)
                                    <option value="{{ $item->evsahibi_adi }}">{{ $item->evsahibi_adi }}</option>
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alacaklars as $key => $alacaklar)
                        <tr data-entry-id="{{ $alacaklar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $alacaklar->id ?? '' }}
                            </td>
                            <td>
                                {{ $alacaklar->musteri_sec->musteri_adi ?? '' }}
                            </td>
                            <td>
                                {{ $alacaklar->tesis_sec->evsahibi_adi ?? '' }}
                            </td>
                            <td>
                                {{ $alacaklar->cari_sec->cari_adi ?? '' }}
                            </td>
                            <td>
                                {{ $alacaklar->tutar ?? '' }}
                            </td>
                            <td>
                                {{ $alacaklar->birim_sec->birim ?? '' }}
                            </td>
                            <td>
                                {{ $alacaklar->aciklama ?? '' }}
                            </td>
                            <td>
                                {{ $alacaklar->odeme_tarihi ?? '' }}
                            </td>
                            <td>
                                @can('alacaklar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.alacaklars.show', $alacaklar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('alacaklar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.alacaklars.edit', $alacaklar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('alacaklar_delete')
                                    <form action="{{ route('admin.alacaklars.destroy', $alacaklar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('alacaklar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.alacaklars.massDestroy') }}",
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
  let table = $('.datatable-Alacaklar:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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