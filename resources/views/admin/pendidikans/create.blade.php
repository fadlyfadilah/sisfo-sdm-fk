@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data Pendidikan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pendidikans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="biodata_id">Biodata</label>
                <select class="form-control select2 {{ $errors->has('biodata') ? 'is-invalid' : '' }}" name="biodata_id" id="biodata_id">
                    @foreach($biodatas as $id => $entry)
                        <option value="{{ $id }}" {{ old('biodata_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('biodata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biodata') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="perguruan_tinggi">Perguruan Tinggi</label>
                <input class="form-control {{ $errors->has('perguruan_tinggi') ? 'is-invalid' : '' }}" type="text" name="perguruan_tinggi" id="perguruan_tinggi" value="{{ old('perguruan_tinggi', '') }}">
                @if($errors->has('perguruan_tinggi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('perguruan_tinggi') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="program_studi">Program Studi</label>
                <input class="form-control {{ $errors->has('program_studi') ? 'is-invalid' : '' }}" type="text" name="program_studi" id="program_studi" value="{{ old('program_studi', '') }}">
                @if($errors->has('program_studi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('program_studi') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="gelar_akademik">Gelar Akademik</label>
                <input class="form-control {{ $errors->has('gelar_akademik') ? 'is-invalid' : '' }}" type="text" name="gelar_akademik" id="gelar_akademik" value="{{ old('gelar_akademik', '') }}">
                @if($errors->has('gelar_akademik'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gelar_akademik') }}
                    </div>
                @endif
            </div>
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
                <label for="thn_masuk">Tahun Masuk</label>
                <input class="form-control {{ $errors->has('thn_masuk') ? 'is-invalid' : '' }}" type="text" name="thn_masuk" id="thn_masuk" value="{{ old('thn_masuk', '') }}">
                @if($errors->has('thn_masuk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thn_masuk') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tahun_lulus">Tahun Lulus</label>
                <input class="form-control {{ $errors->has('tahun_lulus') ? 'is-invalid' : '' }}" type="text" name="tahun_lulus" id="tahun_lulus" value="{{ old('tahun_lulus', '') }}">
                @if($errors->has('tahun_lulus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tahun_lulus') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tanggal_lulus">Tanggal Kelulusan</label>
                <input class="form-control {{ $errors->has('tanggal_lulus') ? 'is-invalid' : '' }}" type="text" name="tanggal_lulus" id="tanggal_lulus" value="{{ old('tanggal_lulus', '') }}">
                @if($errors->has('tanggal_lulus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_lulus') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_induk">No. Induk Mahasiswa</label>
                <input class="form-control {{ $errors->has('no_induk') ? 'is-invalid' : '' }}" type="text" name="no_induk" id="no_induk" value="{{ old('no_induk', '') }}">
                @if($errors->has('no_induk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_induk') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="jumlah_sks">Jumlah SKS Tempuh</label>
                <input class="form-control {{ $errors->has('jumlah_sks') ? 'is-invalid' : '' }}" type="text" name="jumlah_sks" id="jumlah_sks" value="{{ old('jumlah_sks', '') }}">
                @if($errors->has('jumlah_sks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah_sks') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="ipk_lulus">IPK Kelulusan</label>
                <input class="form-control {{ $errors->has('ipk_lulus') ? 'is-invalid' : '' }}" type="text" name="ipk_lulus" id="ipk_lulus" value="{{ old('ipk_lulus', '') }}">
                @if($errors->has('ipk_lulus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ipk_lulus') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="sk_setara">Tanggal SK Penyetaraan</label>
                <input class="form-control {{ $errors->has('sk_setara') ? 'is-invalid' : '' }}" type="text" name="sk_setara" id="sk_setara" value="{{ old('sk_setara', '') }}">
                @if($errors->has('sk_setara'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sk_setara') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tgl_setara">Tanggal SK Penyetaraan</label>
                <input class="form-control date {{ $errors->has('tgl_setara') ? 'is-invalid' : '' }}" type="text" name="tgl_setara" id="tgl_setara" value="{{ old('tgl_setara') }}">
                @if($errors->has('tgl_setara'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tgl_setara') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_ijazah">No. Ijazah</label>
                <input class="form-control {{ $errors->has('no_ijazah') ? 'is-invalid' : '' }}" type="text" name="no_ijazah" id="no_ijazah" value="{{ old('no_ijazah', '') }}">
                @if($errors->has('no_ijazah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_ijazah') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tesis_diser">Judul Tesis/Disertasi</label>
                <input class="form-control {{ $errors->has('tesis_diser') ? 'is-invalid' : '' }}" type="text" name="tesis_diser" id="tesis_diser" value="{{ old('tesis_diser', '') }}">
                @if($errors->has('tesis_diser'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tesis_diser') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="file_ijazah">File Ijazah</label>
                <input class="form-control-file {{ $errors->has('file_ijazah') ? 'is-invalid' : '' }}" type="file" name="file_ijazah" id="file_ijazah" value="{{ old('file_ijazah', '') }}">
                @if($errors->has('file_ijazah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_ijazah') }}
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