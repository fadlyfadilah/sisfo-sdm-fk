@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Lihat Data Diklat
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diklats.index') }}">
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
                            {{ $diklat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $diklat->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jenis Diklat
                        </th>
                        <td>
                            {{ App\Models\Diklat::JENIS_DIKLAT_SELECT[$diklat->jenis_diklat] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kategori Kegiatan
                        </th>
                        <td>
                            {{ App\Models\Diklat::KATEGORI_KEG_SELECT[$diklat->kategori_keg] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Diklat
                        </th>
                        <td>
                            {{ $diklat->nama_diklat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tingkatan Diklat
                        </th>
                        <td>
                            {{ App\Models\Diklat::TINGKATAN_DIKLAT_SELECT[$diklat->tingkatan_diklat] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tahun Diklat
                        </th>
                        <td>
                            {{ $diklat->tahun_diklat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Penyelenggara
                        </th>
                        <td>
                            {{ $diklat->penyelenggara }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Peran
                        </th>
                        <td>
                            {{ $diklat->peran }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jumlah Jam
                        </th>
                        <td>
                            {{ $diklat->jumlah_jam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tempat
                        </th>
                        <td>
                            {{ $diklat->tempat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal Mulai
                        </th>
                        <td>
                            {{ $diklat->tgl_mulai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal Selesai
                        </th>
                        <td>
                            {{ $diklat->tgl_selesai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No SK Penugasan
                        </th>
                        <td>
                            {{ $diklat->no_sk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal SK Penugasan
                        </th>
                        <td>
                            {{ $diklat->tgl_sk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            File Diklat
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$diklat->file_diklat) }}">{{ $diklat->file_diklat }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diklats.index') }}">
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>



@endsection