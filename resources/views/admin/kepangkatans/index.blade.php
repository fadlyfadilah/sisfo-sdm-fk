@extends('layouts.admin')
@section('content')
@can('kepangkatan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.kepangkatans.create') }}">
                Tambah Kepangkatan
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
       Daftar Kepangkatan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Kepangkatan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                           Name
                        </th>
                        <th>
                            Golongan/Pangkat
                        </th>
                        <th>
                            Nomor SK
                        </th>
                        <th>
                            Terhitung Mulai Tanggal
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kepangkatans as $key => $kepangkatan)
                        <tr data-entry-id="{{ $kepangkatan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $kepangkatan->id ?? '' }}
                            </td>
                            <td>
                                {{ $kepangkatan->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Kepangkatan::GOL_SELECT[$kepangkatan->gol] ?? '' }}
                            </td>
                            <td>
                                {{ $kepangkatan->nomorsk ?? '' }}
                            </td>
                            <td>
                                {{ $kepangkatan->tmtskin ?? '' }}
                            </td>
                            <td>
                                @can('kepangkatan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.kepangkatans.show', $kepangkatan->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('kepangkatan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.kepangkatans.edit', $kepangkatan->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('kepangkatan_delete')
                                    <form action="{{ route('admin.kepangkatans.destroy', $kepangkatan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Kepangkatan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection