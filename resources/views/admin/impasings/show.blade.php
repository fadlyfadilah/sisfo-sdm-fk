@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Lihat Inpasing
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.impasings.index') }}">
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
                            {{ $impasing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <td>
                            {{ $impasing->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Golongan/Pangkat
                        </th>
                        <td>
                            {{ App\Models\Impasing::GOL_SELECT[$impasing->gol] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor SK
                        </th>
                        <td>
                            {{ $impasing->nomorskin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal SK
                        </th>
                        <td>
                            {{ $impasing->tgl_skin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Terhitung Mulai Tanggal
                        </th>
                        <td>
                            {{ $impasing->tmtskin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Angka Kredit
                        </th>
                        <td>
                            {{ $impasing->angka_kredit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Masa Kerja (Tahun)
                        </th>
                        <td>
                            {{ $impasing->masa_kerja }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Masa Kerja (Bulan)
                        </th>
                        <td>
                            {{ $impasing->masa_bulan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            File Dokumen
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$impasing->upload_skin) }}">{{ $impasing->upload_skin }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.impasings.index') }}">
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>



@endsection