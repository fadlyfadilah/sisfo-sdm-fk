@can('diklat_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.diklats.create') }}">
                Tambah Data Diklat
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Daftar Data Diklat
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Diklat">
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
                            Jenis Diklat
                        </th>
                        <th>
                            Penyelenggara
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diklats as $key => $diklat)
                        <tr data-entry-id="{{ $diklat->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $diklat->id ?? '' }}
                            </td>
                            <td>
                                {{ $diklat->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Diklat::JENIS_DIKLAT_SELECT[$diklat->jenis_diklat] ?? '' }}
                            </td>
                            <td>
                                {{ $diklat->penyelenggara ?? '' }}
                            </td>
                            <td>
                                {{ $diklat->tahun_diklat ?? '' }}
                            </td>
                            <td>
                                @can('diklat_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.diklats.show', $diklat->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('diklat_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.diklats.edit', $diklat->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('diklat_delete')
                                    <form action="{{ route('admin.diklats.destroy', $diklat->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-biodataDiklats:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection