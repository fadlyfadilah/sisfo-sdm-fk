@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Lihat Rekognisi
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rekognisis.index') }}">
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
                            {{ $rekognisi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <td>
                            {{ $rekognisi->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bidang Ahli
                        </th>
                        <td>
                            {{ $rekognisi->bidangahli }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Rekognisi
                        </th>
                        <td>
                            {{ $rekognisi->rekognisi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tingkat Rekognisi
                        </th>
                        <td>
                            {{ App\Models\Rekognisi::TINGKAT_REG_SELECT[$rekognisi->tingkat_reg] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jenis Rekognisi
                        </th>
                        <td>
                            {{ App\Models\Rekognisi::JENIS_REKO_SELECT[$rekognisi->jenis_reko] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tahun Akademik
                        </th>
                        <td>
                            {{ App\Models\Rekognisi::AKADEMIK_SELECT[$rekognisi->akademik] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rekognisis.index') }}">
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>



@endsection