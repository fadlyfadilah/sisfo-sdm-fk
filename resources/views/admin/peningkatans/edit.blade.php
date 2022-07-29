@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.peningkatan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.peningkatans.update", [$peningkatan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="biodata_id">Biodata</label>
                <select class="form-control select2 {{ $errors->has('biodata') ? 'is-invalid' : '' }}" name="biodata_id" id="biodata_id">
                    @foreach($biodatas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('biodata_id') ? old('biodata_id') : $peningkatan->biodata->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('biodata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biodata') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Jenis Kegiatan</label>
                <select class="form-control {{ $errors->has('jenis_kegiatan') ? 'is-invalid' : '' }}" name="jenis_kegiatan" id="jenis_kegiatan">
                    <option value disabled {{ old('jenis_kegiatan', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih!') }}</option>
                    @foreach(App\Models\Peningkatan::JENIS_KEGIATAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_kegiatan', $peningkatan->jenis_kegiatan) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_kegiatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis_kegiatan') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input class="form-control {{ $errors->has('nama_kegiatan') ? 'is-invalid' : '' }}" type="text" name="nama_kegiatan" id="nama_kegiatan" value="{{ old('nama_kegiatan', $peningkatan->nama_kegiatan) }}">
                @if($errors->has('nama_kegiatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_kegiatan') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tempat">Tempat</label>
                <input class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }}" type="text" name="tempat" id="tempat" value="{{ old('tempat', $peningkatan->tempat) }}">
                @if($errors->has('tempat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tempat') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tgl_mulai">Waktu</label>
                <input class="form-control date {{ $errors->has('tgl_mulai') ? 'is-invalid' : '' }}" type="text" name="tgl_mulai" id="tgl_mulai" value="{{ old('tgl_mulai', $peningkatan->tgl_mulai) }}">
                @if($errors->has('tgl_mulai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tgl_mulai') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Peran</label>
                <select class="form-control {{ $errors->has('peran') ? 'is-invalid' : '' }}" name="peran" id="peran">
                    <option value disabled {{ old('peran', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih!') }}</option>
                    @foreach(App\Models\Peningkatan::PERAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('peran', $peningkatan->peran) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('peran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('peran') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tingkatan Kegiatan</label>
                <select class="form-control {{ $errors->has('tingkatan_kegiatan') ? 'is-invalid' : '' }}" name="tingkatan_kegiatan" id="tingkatan_kegiatan">
                    <option value disabled {{ old('tingkatan_kegiatan', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih!') }}</option>
                    @foreach(App\Models\Peningkatan::TINGKATAN_KEGIATAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tingkatan_kegiatan', $peningkatan->tingkatan_kegiatan) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tingkatan_kegiatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tingkatan_kegiatan') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tahun_kegiatan">Tahun Kegiatan</label>
                <input class="form-control {{ $errors->has('tahun_kegiatan') ? 'is-invalid' : '' }}" type="text" name="tahun_kegiatan" id="tahun_kegiatan" value="{{ old('tahun_kegiatan', $peningkatan->tahun_kegiatan) }}">
                @if($errors->has('tahun_kegiatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tahun_kegiatan') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tahun Akademik</label>
                <select class="form-control {{ $errors->has('akademik') ? 'is-invalid' : '' }}" name="akademik" id="akademik">
                    <option value disabled {{ old('akademik', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih') }}</option>
                    @foreach(App\Models\Rekognisi::AKADEMIK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('akademik', $rekognisi->akademik) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('akademik'))
                    <div class="invalid-feedback">
                        {{ $errors->first('akademik') }}
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