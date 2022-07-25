@extends('layouts.frontend')
@section('content')
@can('sertifikasiprof_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('frontend.sertifikasiprofs.create') }}">
                Tambah Data
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Daftar Data
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Sertifikasiprof">
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
                            Bidang Studi
                        </th>
                        <th>
                            No Registrasi Pendidikan
                        </th>
                        <th>
                            No. SK
                        </th>
                        <th>
                            Tahun Sertifikasi
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sertifikasiprofs as $key => $sertifikasiprof)
                        <tr data-entry-id="{{ $sertifikasiprof->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sertifikasiprof->id ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasiprof->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasiprof->bidang_studi ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasiprof->no_re ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasiprof->no_sk ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasiprof->tahun_serti ?? '' }}
                            </td>
                            <td>
                                @can('sertifikasiprof_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('frontend.sertifikasiprofs.show', $sertifikasiprof->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('sertifikasiprof_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('frontend.sertifikasiprofs.edit', $sertifikasiprof->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('sertifikasiprof_delete')
                                    <form action="{{ route('frontend.sertifikasiprofs.destroy', $sertifikasiprof->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Sertifikasiprof:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection