@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        Lihat Studi Lanjut
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.studis.index') }}">
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
                            {{ $studi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $studi->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jenjang
                        </th>
                        <td>
                            {{ $studi->jenjang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bidang Studi
                        </th>
                        <td>
                            {{ $studi->bidang_studi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Universitas
                        </th>
                        <td>
                            {{ $studi->univ }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Negara
                        </th>
                        <td>
                            {{ $studi->negara }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tahun Mulai
                        </th>
                        <td>
                            {{ $studi->mulai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tahun Akademik
                        </th>
                        <td>
                            {{ App\Models\Studi::AKADEMIK_SELECT[$studi->akademik] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.studis.index') }}">
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>



@endsection