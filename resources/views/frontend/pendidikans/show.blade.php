@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        List Data Pendidikan
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.pendidikans.index') }}">
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
                            {{ $pendidikan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $pendidikan->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Perguruan Tinggi
                        </th>
                        <td>
                            {{ $pendidikan->perguruan_tinggi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Program Studi
                        </th>
                        <td>
                            {{ $pendidikan->program_studi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Gelar Akademik
                        </th>
                        <td>
                            {{ $pendidikan->gelar_akademik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bidang Studi
                        </th>
                        <td>
                            {{ $pendidikan->bidang_studi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tahun Masuk
                        </th>
                        <td>
                            {{ $pendidikan->thn_masuk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tahun Lulus
                        </th>
                        <td>
                            {{ $pendidikan->tahun_lulus }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal Kelulusan
                        </th>
                        <td>
                            {{ $pendidikan->tanggal_lulus }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No. Induk Mahasiswa
                        </th>
                        <td>
                            {{ $pendidikan->no_induk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jumlah SKS Tempuh
                        </th>
                        <td>
                            {{ $pendidikan->jumlah_sks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            IPK Kelulusan
                        </th>
                        <td>
                            {{ $pendidikan->ipk_lulus }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No. SK Penyetaraan
                        </th>
                        <td>
                            {{ $pendidikan->sk_setara }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal SK Penyetaraan
                        </th>
                        <td>
                            {{ $pendidikan->tgl_setara }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No. Ijazah
                        </th>
                        <td>
                            {{ $pendidikan->no_ijazah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Judul Tesis/Disertasi
                        </th>
                        <td>
                            {{ $pendidikan->tesis_diser }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            File Ijazah
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$pendidikan->file_ijazah) }}">{{ $pendidikan->file_ijazah }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.pendidikans.index') }}">
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>



@endsection