@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Ubah Sertifikasi Dosen
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sertifikasis.update", [$sertifikasi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="biodata_id">Biodata</label>
                <select class="form-control select2 {{ $errors->has('biodata') ? 'is-invalid' : '' }}" name="biodata_id" id="biodata_id">
                    @foreach($biodatas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('biodata_id') ? old('biodata_id') : $sertifikasi->biodata->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <input class="form-control {{ $errors->has('bidang_studi') ? 'is-invalid' : '' }}" type="text" name="bidang_studi" id="bidang_studi" value="{{ old('bidang_studi', $sertifikasi->bidang_studi) }}">
                @if($errors->has('bidang_studi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bidang_studi') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="nosk_serti">No. SK Sertifikasi</label>
                <input class="form-control {{ $errors->has('nosk_serti') ? 'is-invalid' : '' }}" type="text" name="nosk_serti" id="nosk_serti" value="{{ old('nosk_serti', $sertifikasi->nosk_serti) }}">
                @if($errors->has('nosk_serti'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nosk_serti') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tahun_serti">Tahun Sertifikasi</label>
                <input class="form-control {{ $errors->has('tahun_serti') ? 'is-invalid' : '' }}" type="text" name="tahun_serti" id="tahun_serti" value="{{ old('tahun_serti', $sertifikasi->tahun_serti) }}">
                @if($errors->has('tahun_serti'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tahun_serti') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_peserta">No. Peserta</label>
                <input class="form-control {{ $errors->has('no_peserta') ? 'is-invalid' : '' }}" type="text" name="no_peserta" id="no_peserta" value="{{ old('no_peserta', $sertifikasi->no_peserta) }}">
                @if($errors->has('no_peserta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_peserta') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="noreg">No. Registrasi</label>
                <input class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }}" type="text" name="noreg" id="noreg" value="{{ old('noreg', $sertifikasi->noreg) }}">
                @if($errors->has('noreg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('noreg') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="file_serdos">File Sertifikasi Dosen</label>
                <input class="form-control {{ $errors->has('file_serdos') ? 'is-invalid' : '' }}" type="text" name="file_serdos" id="file_serdos" value="{{ old('file_serdos', $sertifikasi->file_serdos) }}">
                @if($errors->has('file_serdos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_serdos') }}
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