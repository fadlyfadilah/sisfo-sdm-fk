@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("frontend.sertifikasiprofs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bidang_studi">Bidang Studi</label>
                <input class="form-control {{ $errors->has('bidang_studi') ? 'is-invalid' : '' }}" type="text" name="bidang_studi" id="bidang_studi" value="{{ old('bidang_studi', '') }}">
                @if($errors->has('bidang_studi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bidang_studi') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_re">No registrasi Pendidikan</label>
                <input class="form-control {{ $errors->has('no_re') ? 'is-invalid' : '' }}" type="text" name="no_re" id="no_re" value="{{ old('no_re', '') }}">
                @if($errors->has('no_re'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_re') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_sk">No. Sk Sertifikasi</label>
                <input class="form-control {{ $errors->has('no_sk') ? 'is-invalid' : '' }}" type="text" name="no_sk" id="no_sk" value="{{ old('no_sk', '') }}">
                @if($errors->has('no_sk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_sk') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tahun_serti">Tahun Sertifikasi</label>
                <input class="form-control {{ $errors->has('tahun_serti') ? 'is-invalid' : '' }}" type="text" name="tahun_serti" id="tahun_serti" value="{{ old('tahun_serti', '') }}">
                @if($errors->has('tahun_serti'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tahun_serti') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="file_serti">File Sertifikasi Profesi</label>
                <input class="form-control-file {{ $errors->has('file_serti') ? 'is-invalid' : '' }}" type="file" name="file_serti" id="file_serti" value="{{ old('file_serti', '') }}">
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