@extends('layouts.frontend')
@section('content')
@can('peningkatan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-6">
            <a class="btn btn-success" href="{{ route('frontend.peningkatans.create') }}">
                Tambah Peningkatan Dosen
            </a>
        </div>
        <div class="col-lg-6">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown"
                    aria-expanded="false">
                    Export
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/frontend/export/peningkatan">Data Peningkatan kompetensi Dosen</a></li>
                </ul>
            </div>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Daftar Peningkatan Dosen
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Peningkatan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Jenis Kegiatan
                        </th>
                        <th>
                            Nama Kegiatan
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
                    @foreach($peningkatans as $key => $peningkatan)
                        <tr data-entry-id="{{ $peningkatan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $peningkatan->id ?? '' }}
                            </td>
                            <td>
                                {{ $peningkatan->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Peningkatan::JENIS_KEGIATAN_SELECT[$peningkatan->jenis_kegiatan] ?? '' }}
                            </td>
                            <td>
                                {{ $peningkatan->nama_kegiatan ?? '' }}
                            </td>
                            <td>
                                {{ $peningkatan->tahun_kegiatan ?? '' }}
                            </td>
                            <td>
                                @can('peningkatan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('frontend.peningkatans.show', $peningkatan->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('peningkatan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('frontend.peningkatans.edit', $peningkatan->id) }}">
                                       Edit
                                    </a>
                                @endcan

                                @can('peningkatan_delete')
                                    <form action="{{ route('frontend.peningkatans.destroy', $peningkatan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete>
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
  let table = $('.datatable-Peningkatan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection