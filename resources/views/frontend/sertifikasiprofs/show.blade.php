@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        List Data
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.sertifikasiprofs.index') }}">
                    Kembali Ke Daftar
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $sertifikasiprof->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $sertifikasiprof->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bidang Studi
                        </th>
                        <td>
                            {{ $sertifikasiprof->bidang_studi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No registrasi Pendidikan
                        </th>
                        <td>
                            {{ $sertifikasiprof->no_re }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No. Sk Sertifikasi
                        </th>
                        <td>
                            {{ $sertifikasiprof->no_sk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tahun Sertifikasi
                        </th>
                        <td>
                            {{ $sertifikasiprof->tahun_serti }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            File Sertifikasi Profesi
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$sertifikasiprof->file_serti) }}">{{ $sertifikasiprof->file_serti }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.sertifikasiprofs.index') }}">
                    Kembali Ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>



@endsection