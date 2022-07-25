@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        Detail Peningkatan Dosen
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.peningkatans.index') }}">
                    Kembali ke Daftar
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Id
                        </th>
                        <td>
                            {{ $peningkatan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $peningkatan->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jenis Kegiatan
                        </th>
                        <td>
                            {{ App\Models\Peningkatan::JENIS_KEGIATAN_SELECT[$peningkatan->jenis_kegiatan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Kegiatan
                        </th>
                        <td>
                            {{ $peningkatan->nama_kegiatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tempat
                        </th>
                        <td>
                            {{ $peningkatan->tempat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Waktu
                        </th>
                        <td>
                            {{ $peningkatan->tgl_mulai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Peran
                        </th>
                        <td>
                            {{ App\Models\Peningkatan::PERAN_SELECT[$peningkatan->peran] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tingkatan Kegiatan
                        </th>
                        <td>
                            {{ App\Models\Peningkatan::TINGKATAN_KEGIATAN_SELECT[$peningkatan->tingkatan_kegiatan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tahun Kegiatan
                        </th>
                        <td>
                            {{ $peningkatan->tahun_kegiatan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.peningkatans.index') }}">
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>



@endsection