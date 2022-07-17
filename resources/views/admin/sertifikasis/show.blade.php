@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sertifikasi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sertifikasis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $sertifikasi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $sertifikasi->biodata->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bidang Studi
                        </th>
                        <td>
                            {{ $sertifikasi->bidang_studi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No. SK Sertifikasi
                        </th>
                        <td>
                            {{ $sertifikasi->nosk_serti }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tahun Sertifikasi
                        </th>
                        <td>
                            {{ $sertifikasi->tahun_serti }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No. Peserta
                        </th>
                        <td>
                            {{ $sertifikasi->no_peserta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No. Registrasi
                        </th>
                        <td>
                            {{ $sertifikasi->noreg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            File Sertifikasi Dosen
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$sertifikasi->file_serdos) }}">{{ $sertifikasi->file_serdos }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sertifikasis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection