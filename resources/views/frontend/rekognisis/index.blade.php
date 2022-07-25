@extends('layouts.frontend')
@section('content')
@can('rekognisi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-6">
            <a class="btn btn-success" href="{{ route('frontend.rekognisis.create') }}">
                Tambah Rekognisi
            </a>
        </div>
        <div class="col-lg-6">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown"
                    aria-expanded="false">
                    Export
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/frontend/export/rekognisi">Data Rekognisi Dosen</a></li>
                </ul>
            </div>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Daftar Rekognisi
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Rekognisi">
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
                            Bidang Ahli
                        </th>
                        <th>
                            Nama Rekognisi
                        </th>
                        <th>
                            Tingkat Rekognisi
                        </th>
                        <th>
                            Jenis Rekognisi
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
                    @foreach($rekognisis as $key => $rekognisi)
                        <tr data-entry-id="{{ $rekognisi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $rekognisi->id ?? '' }}
                            </td>
                            <td>
                                {{ $rekognisi->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ $rekognisi->bidangahli ?? '' }}
                            </td>
                            <td>
                                {{ $rekognisi->rekognisi ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Rekognisi::TINGKAT_REG_SELECT[$rekognisi->tingkat_reg] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Rekognisi::JENIS_REKO_SELECT[$rekognisi->jenis_reko] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Rekognisi::AKADEMIK_SELECT[$rekognisi->akademik] ?? '' }}
                            </td>
                            <td>
                                @can('rekognisi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('frontend.rekognisis.show', $rekognisi->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('rekognisi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('frontend.rekognisis.edit', $rekognisi->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('rekognisi_delete')
                                    <form action="{{ route('frontend.rekognisis.destroy', $rekognisi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Rekognisi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection