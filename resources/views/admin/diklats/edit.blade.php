@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Ubah Dat Diklat
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.diklats.update", [$diklat->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="biodata_id">Biodata</label>
                <select class="form-control select2 {{ $errors->has('biodata') ? 'is-invalid' : '' }}" name="biodata_id" id="biodata_id">
                    @foreach($biodatas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('biodata_id') ? old('biodata_id') : $diklat->biodata->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('biodata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biodata') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Jenis Diklat</label>
                <select class="form-control {{ $errors->has('jenis_diklat') ? 'is-invalid' : '' }}" name="jenis_diklat" id="jenis_diklat">
                    <option value disabled {{ old('jenis_diklat', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih') }}</option>
                    @foreach(App\Models\Diklat::JENIS_DIKLAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_diklat', $diklat->jenis_diklat) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_diklat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis_diklat') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Kategori Kegiatan</label>
                <select class="form-control {{ $errors->has('kategori_keg') ? 'is-invalid' : '' }}" name="kategori_keg" id="kategori_keg">
                    <option value disabled {{ old('kategori_keg', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih') }}</option>
                    @foreach(App\Models\Diklat::KATEGORI_KEG_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kategori_keg', $diklat->kategori_keg) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('kategori_keg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kategori_keg') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="nama_diklat">Nama Diklat</label>
                <input class="form-control {{ $errors->has('nama_diklat') ? 'is-invalid' : '' }}" type="text" name="nama_diklat" id="nama_diklat" value="{{ old('nama_diklat', $diklat->nama_diklat) }}">
                @if($errors->has('nama_diklat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_diklat') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tingkatan Diklat</label>
                <select class="form-control {{ $errors->has('tingkatan_diklat') ? 'is-invalid' : '' }}" name="tingkatan_diklat" id="tingkatan_diklat">
                    <option value disabled {{ old('tingkatan_diklat', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih') }}</option>
                    @foreach(App\Models\Diklat::TINGKATAN_DIKLAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tingkatan_diklat', $diklat->tingkatan_diklat) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tingkatan_diklat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tingkatan_diklat') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tahun_diklat">Tahun Diklat</label>
                <input class="form-control {{ $errors->has('tahun_diklat') ? 'is-invalid' : '' }}" type="text" name="tahun_diklat" id="tahun_diklat" value="{{ old('tahun_diklat', $diklat->tahun_diklat) }}">
                @if($errors->has('tahun_diklat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tahun_diklat') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="penyelenggara">Penyelenggara</label>
                <input class="form-control {{ $errors->has('penyelenggara') ? 'is-invalid' : '' }}" type="text" name="penyelenggara" id="penyelenggara" value="{{ old('penyelenggara', $diklat->penyelenggara) }}">
                @if($errors->has('penyelenggara'))
                    <div class="invalid-feedback">
                        {{ $errors->first('penyelenggara') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="peran">Peran</label>
                <input class="form-control {{ $errors->has('peran') ? 'is-invalid' : '' }}" type="text" name="peran" id="peran" value="{{ old('peran', $diklat->peran) }}">
                @if($errors->has('peran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('peran') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="jumlah_jam">Jumlah Jam</label>
                <input class="form-control {{ $errors->has('jumlah_jam') ? 'is-invalid' : '' }}" type="text" name="jumlah_jam" id="jumlah_jam" value="{{ old('jumlah_jam', $diklat->jumlah_jam) }}">
                @if($errors->has('jumlah_jam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah_jam') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tempat">Tempat</label>
                <input class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }}" type="text" name="tempat" id="tempat" value="{{ old('tempat', $diklat->tempat) }}">
                @if($errors->has('tempat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tempat') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input class="form-control date {{ $errors->has('tgl_mulai') ? 'is-invalid' : '' }}" type="text" name="tgl_mulai" id="tgl_mulai" value="{{ old('tgl_mulai', $diklat->tgl_mulai) }}">
                @if($errors->has('tgl_mulai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tgl_mulai') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input class="form-control date {{ $errors->has('tgl_selesai') ? 'is-invalid' : '' }}" type="text" name="tgl_selesai" id="tgl_selesai" value="{{ old('tgl_selesai', $diklat->tgl_selesai) }}">
                @if($errors->has('tgl_selesai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tgl_selesai') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_sk">No SK Penugasan</label>
                <input class="form-control {{ $errors->has('no_sk') ? 'is-invalid' : '' }}" type="text" name="no_sk" id="no_sk" value="{{ old('no_sk', $diklat->no_sk) }}">
                @if($errors->has('no_sk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_sk') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tgl_sk">Tanggal SK Penugasan</label>
                <input class="form-control {{ $errors->has('tgl_sk') ? 'is-invalid' : '' }}" type="text" name="tgl_sk" id="tgl_sk" value="{{ old('tgl_sk', $diklat->tgl_sk) }}">
                @if($errors->has('tgl_sk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tgl_sk') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="file_diklat">File Diklat</label>
                <input class="form-control-file {{ $errors->has('file_diklat') ? 'is-invalid' : '' }}" type="file" name="file_diklat" id="file_diklat" value="{{ old('file_diklat', $diklat->file_diklat) }}">
                @if($errors->has('file_diklat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_diklat') }}
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