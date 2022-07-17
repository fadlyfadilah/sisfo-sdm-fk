@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Ubah Kepangkatan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kepangkatans.update", [$kepangkatan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="biodata_id">Biodata</label>
                <select class="form-control select2 {{ $errors->has('biodata') ? 'is-invalid' : '' }}" name="biodata_id" id="biodata_id">
                    @foreach($biodatas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('biodata_id') ? old('biodata_id') : $kepangkatan->biodata->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('biodata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biodata') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Golongan/Pangkat</label>
                <select class="form-control {{ $errors->has('gol') ? 'is-invalid' : '' }}" name="gol" id="gol">
                    <option value disabled {{ old('gol', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Kepangkatan::GOL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gol', $kepangkatan->gol) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gol'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gol') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="nomorsk">No. SK</label>
                <input class="form-control {{ $errors->has('nomorsk') ? 'is-invalid' : '' }}" type="text" name="nomorsk" id="nomorsk" value="{{ old('nomorsk', $kepangkatan->nomorsk) }}">
                @if($errors->has('nomorsk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomorsk') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tgl_skin">Tanggal SK</label>
                <input class="form-control date {{ $errors->has('tgl_skin') ? 'is-invalid' : '' }}" type="text" name="tgl_skin" id="tgl_skin" value="{{ old('tgl_skin', $kepangkatan->tgl_skin) }}">
                @if($errors->has('tgl_skin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tgl_skin') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tmtskin">Terhitung Mulai Taggal</label>
                <input class="form-control date {{ $errors->has('tmtskin') ? 'is-invalid' : '' }}" type="text" name="tmtskin" id="tmtskin" value="{{ old('tmtskin', $kepangkatan->tmtskin) }}">
                @if($errors->has('tmtskin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tmtskin') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="masa_kerja">Masa Kerja(Tahun)</label>
                <input class="form-control {{ $errors->has('masa_kerja') ? 'is-invalid' : '' }}" type="text" name="masa_kerja" id="masa_kerja" value="{{ old('masa_kerja', $kepangkatan->masa_kerja) }}">
                @if($errors->has('masa_kerja'))
                    <div class="invalid-feedback">
                        {{ $errors->first('masa_kerja') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="masa_bulan">Masa Kerja (Bulan)</label>
                <input class="form-control {{ $errors->has('masa_bulan') ? 'is-invalid' : '' }}" type="text" name="masa_bulan" id="masa_bulan" value="{{ old('masa_bulan', $kepangkatan->masa_bulan) }}">
                @if($errors->has('masa_bulan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('masa_bulan') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="upload_sk">Upload File SK Kepangkatan</label>
                <input class="form-control-file {{ $errors->has('upload_sk') ? 'is-invalid' : '' }}" type="file" name="upload_sk" id="upload_sk" value="{{ old('upload_sk', $kepangkatan->upload_sk) }}">
                @if($errors->has('upload_sk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('upload_sk') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    simpan
                </button>
            </div>
        </form>
    </div>
</div>



@endsection