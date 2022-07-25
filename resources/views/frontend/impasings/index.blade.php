@extends('layouts.frontend')
@section('content')
@can('impasing_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('frontend.impasings.create') }}">
                Tambah Data Inpassing
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Daftar Inpassing
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Impasing">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Nomor SK
                        </th>
                        <th>
                            Terhitung Tanggal
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($impasings as $key => $impasing)
                        <tr data-entry-id="{{ $impasing->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $impasing->id ?? '' }}
                            </td>
                            <td>
                                {{ $impasing->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ $impasing->nomorskin ?? '' }}
                            </td>
                            <td>
                                {{ $impasing->tmtskin ?? '' }}
                            </td>
                            <td>
                                @can('impasing_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('frontend.impasings.show', $impasing->id) }}">
                                       View
                                    </a>
                                @endcan

                                @can('impasing_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('frontend.impasings.edit', $impasing->id) }}">
                                       Edit
                                    </a>
                                @endcan

                                @can('impasing_delete')
                                    <form action="{{ route('frontend.impasings.destroy', $impasing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Impasing:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection