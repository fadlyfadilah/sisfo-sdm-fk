@can('sertifikasi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sertifikasis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sertifikasi.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sertifikasi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Sertifikasi">
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
                            Bidang Studi
                        </th>
                        <th>
                            No. SK Sertifikasi
                        </th>
                        <th>
                            No. Registrasi
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
                    @foreach($sertifikasis as $key => $sertifikasi)
                        <tr data-entry-id="{{ $sertifikasi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sertifikasi->id ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasi->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasi->bidang_studi ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasi->nosk_serti ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasi->noreg ?? '' }}
                            </td>
                            <td>
                                {{ $sertifikasi->tahun_serti ?? '' }}
                            </td>
                            <td>
                                @can('sertifikasi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sertifikasis.show', $sertifikasi->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('sertifikasi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sertifikasis.edit', $sertifikasi->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('sertifikasi_delete')
                                    <form action="{{ route('admin.sertifikasis.destroy', $sertifikasi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Sertifikasi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>