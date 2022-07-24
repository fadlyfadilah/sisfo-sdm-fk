@extends('layouts.admin')
@section('content')
@can('studi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-6">
            <a class="btn btn-success" href="{{ route('admin.studis.create') }}">
                Tambah Studi Lanjut
            </a>
        </div>
        <div class="col-lg-6">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown"
                    aria-expanded="false">
                    Export
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/admin/export/studi">Data Studi Lanjut Dosen</a></li>
                </ul>
            </div>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Daftar Studi Lanjut
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Studi">
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
                            Jenjang
                        </th>
                        <th>
                            Bidang Studi
                        </th>
                        <th>
                            Universitas
                        </th>
                        <th>
                            Negara
                        </th>
                        <th>
                            Tahun Mulai
                        </th>
                        <th>
                            Tahun Akademik
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studis as $key => $studi)
                        <tr data-entry-id="{{ $studi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $studi->id ?? '' }}
                            </td>
                            <td>
                                {{ $studi->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ $studi->jenjang ?? '' }}
                            </td>
                            <td>
                                {{ $studi->bidang_studi ?? '' }}
                            </td>
                            <td>
                                {{ $studi->univ ?? '' }}
                            </td>
                            <td>
                                {{ $studi->negara ?? '' }}
                            </td>
                            <td>
                                {{ $studi->mulai ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Studi::AKADEMIK_SELECT[$studi->akademik] ?? '' }}
                            </td>
                            <td>
                                @can('studi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.studis.show', $studi->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('studi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.studis.edit', $studi->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('studi_delete')
                                    <form action="{{ route('admin.studis.destroy', $studi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Studi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection