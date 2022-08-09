@extends('layouts.admin')
@section('content')
    @can('biodatum_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-6">
                <a class="btn btn-success" href="{{ route('admin.biodata.create') }}">
                    Tambah Data Diri
                </a>
            </div>
            <div class="col-lg-6">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-coreui-toggle="dropdown"
                        aria-expanded="false">
                        Export
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/admin/export/biodata">Data Dosen</a></li>
                        <li><a class="dropdown-item" href="/admin/export/biodataAkademik">Data Dosen Akademik</a></li>
                        <li><a class="dropdown-item" href="/admin/export/biodataProfesi">Data Dosen Profesi</a></li>
                        <li><a class="dropdown-item" href="/admin/export/biodataTetap">Data Dosen Tetap</a></li>
                        <li><a class="dropdown-item" href="/admin/export/biodataTidakTetap">Data Dosen Tidak Tetap</a></li>
                        <li><a class="dropdown-item" href="/admin/exportpdf/biodataTidakTetap">Data Dosen Tidak Tetap (.pdf)</a></li>
                        <li><a class="dropdown-item" href="/admin/export/biodataKontrakYayasan">Data Dosen Kontrak Yayasan</a></li>
                        <li><a class="dropdown-item" href="/admin/export/biodataAmi">Data Dosen Borang AMI</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Daftar
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Biodatum">
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
                                Usia
                            </th>
                            <th>
                                Masa Kerja
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biodata as $key => $biodatum)
                            <tr data-entry-id="{{ $biodatum->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $biodatum->id ?? '' }}
                                </td>
                                <td>
                                    {{ $biodatum->nik->name ?? '' }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($biodatum->tgl)->diff()->y }} Tahun
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($biodatum->tgl_sktmt)->diff()->y }} Tahun
                                </td>
                                <td>
                                    @can('biodatum_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.biodata.show', $biodatum->id) }}">
                                            View
                                        </a>
                                    @endcan

                                    @can('biodatum_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.biodata.edit', $biodatum->id) }}">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('biodatum_delete')
                                        <form action="{{ route('admin.biodata.destroy', $biodatum->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
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
        function ex_dosen() {
            var url = "/admin/biodata/export";

            window.open(url, '_blank', 'status=no');
            return false;
        }
    </script>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'asc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Biodatum:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
