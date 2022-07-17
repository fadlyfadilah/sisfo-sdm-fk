@can('pendidikan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pendidikans.create') }}">
                Tambah Data Pendidikan
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Daftar Data Pendidikan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pendidikan">
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
                            Gelar
                        </th>
                        <th>
                            Bidang Studi
                        </th>
                        <th>
                            Perguruan Tinggi
                        </th>
                        <th>
                            Tahun Lulus
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendidikans as $key => $pendidikan)
                        <tr data-entry-id="{{ $pendidikan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pendidikan->id ?? '' }}
                            </td>
                            <td>
                                {{ $pendidikan->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ $pendidikan->gelar_akademik ?? '' }}
                            </td>
                            <td>
                                {{ $pendidikan->bidang_studi ?? '' }}
                            </td>
                            <td>
                                {{ $pendidikan->perguruan_tinggi ?? '' }}
                            </td>
                            <td>
                                {{ $pendidikan->tahun_lulus ?? '' }}
                            </td>
                            <td>
                                @can('pendidikan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pendidikans.show', $pendidikan->id) }}">
                                       View
                                    </a>
                                @endcan

                                @can('pendidikan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pendidikans.edit', $pendidikan->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('pendidikan_delete')
                                    <form action="{{ route('admin.pendidikans.destroy', $pendidikan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-biodataPendidikans:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection