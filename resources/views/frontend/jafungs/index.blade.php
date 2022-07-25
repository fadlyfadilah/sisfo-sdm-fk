@extends('layouts.frontend')
@section('content')
@can('jafung_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('frontend.jafungs.create') }}">
                Tambah Jabatan Fungsional
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Daftar Jabfung
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Jafung">
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
                            Jabatan Fungsional
                        </th>
                        <th>
                            No. SK
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
                    @foreach($jafungs as $key => $jafung)
                        <tr data-entry-id="{{ $jafung->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jafung->id ?? '' }}
                            </td>
                            <td>
                                {{ $jafung->biodata->nik->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Jafung::JAB_FUNG_SELECT[$jafung->jab_fung] ?? '' }}
                            </td>
                            <td>
                                {{ $jafung->no_skjab ?? '' }}
                            </td>
                            <td>
                                {{ $jafung->tmt_jab ?? '' }}
                            </td>
                            <td>
                                @can('jafung_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('frontend.jafungs.show', $jafung->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('jafung_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('frontend.jafungs.edit', $jafung->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('jafung_delete')
                                    <form action="{{ route('frontend.jafungs.destroy', $jafung->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Jafung:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection