@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Data
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sertifikasiprofs.update", [$sertifikasiprof->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="biodata_id">Biodata</label>
                <select class="form-control select2 {{ $errors->has('biodata') ? 'is-invalid' : '' }}" name="biodata_id" id="biodata_id">
                    @foreach($biodatas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('biodata_id') ? old('biodata_id') : $sertifikasiprof->biodata->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('biodata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biodata') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="bidang_studi">Bidang Studi</label>
                <input class="form-control {{ $errors->has('bidang_studi') ? 'is-invalid' : '' }}" type="text" name="bidang_studi" id="bidang_studi" value="{{ old('bidang_studi', $sertifikasiprof->bidang_studi) }}">
                @if($errors->has('bidang_studi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bidang_studi') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_re">No registrasi Pendidikan</label>
                <input class="form-control {{ $errors->has('no_re') ? 'is-invalid' : '' }}" type="text" name="no_re" id="no_re" value="{{ old('no_re', $sertifikasiprof->no_re) }}">
                @if($errors->has('no_re'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_re') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_sk">No. Sk Sertifikasi</label>
                <input class="form-control {{ $errors->has('no_sk') ? 'is-invalid' : '' }}" type="text" name="no_sk" id="no_sk" value="{{ old('no_sk', $sertifikasiprof->no_sk) }}">
                @if($errors->has('no_sk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_sk') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tahun_serti">Tahun Sertifikasi</label>
                <input class="form-control {{ $errors->has('tahun_serti') ? 'is-invalid' : '' }}" type="text" name="tahun_serti" id="tahun_serti" value="{{ old('tahun_serti', $sertifikasiprof->tahun_serti) }}">
                @if($errors->has('tahun_serti'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tahun_serti') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="file_serti">File Sertifikasi Profesi</label>
                <input class="form-control {{ $errors->has('file_serti') ? 'is-invalid' : '' }}" type="text" name="file_serti" id="file_serti" value="{{ old('file_serti', $sertifikasiprof->file_serti) }}">
                @if($errors->has('file_serti'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_serti') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>



@endsection