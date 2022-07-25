@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        Lihat Kepangkatan
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.kepangkatans.index') }}">
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
                            {{ $kepangkatan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $kepangkatan->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Golongan/Pangkat
                        </th>
                        <td>
                            {{ App\Models\Kepangkatan::GOL_SELECT[$kepangkatan->gol] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor SK
                        </th>
                        <td>
                            {{ $kepangkatan->nomorsk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal SK
                        </th>
                        <td>
                            {{ $kepangkatan->tgl_skin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Terhitung Mulai Tanggal
                        </th>
                        <td>
                            {{ $kepangkatan->tmtskin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Masa Kerja (Tahun)
                        </th>
                        <td>
                            {{ $kepangkatan->masa_kerja }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Masa Kerja (Bulan)
                        </th>
                        <td>
                            {{ $kepangkatan->masa_bulan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            File SK
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$kepangkatan->upload_sk) }}">{{ $kepangkatan->upload_sk }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.kepangkatans.index') }}">
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>



@endsection