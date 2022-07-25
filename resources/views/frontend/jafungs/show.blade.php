@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        Lihat Jabatan Fungsional
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.jafungs.index') }}">
                    Kembali ke daftar
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $jafung->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <td>
                            {{ $jafung->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jabatan Fungsional
                        </th>
                        <td>
                            {{ App\Models\Jafung::JAB_FUNG_SELECT[$jafung->jab_fung] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No. Sk
                        </th>
                        <td>
                            {{ $jafung->no_skjab }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Terhitung Mulai Tanggal
                        </th>
                        <td>
                            {{ $jafung->tmt_jab }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kelebihan Pengajaran 
                        </th>
                        <td>
                            {{ $jafung->leb_ajar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kelebihan Pengajaran
                        </th>
                        <td>
                            {{ $jafung->leb_pen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kelebihan Pengajaran
                        </th>
                        <td>
                            {{ $jafung->leb_pkm }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kelebihan Penunjang
                        </th>
                        <td>
                            {{ $jafung->leb_penun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            File Jabatan Fungsional
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$jafung->file_jabfung) }}">{{ $jafung->file_jabfung }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.jafungs.index') }}">
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>



@endsection