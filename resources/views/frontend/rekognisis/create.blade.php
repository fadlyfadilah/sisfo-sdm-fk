@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Rekognisi
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("frontend.rekognisis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bidangahli">Bidang Ahli</label>
                <input class="form-control {{ $errors->has('bidangahli') ? 'is-invalid' : '' }}" type="text" name="bidangahli" id="bidangahli" value="{{ old('bidangahli', '') }}">
                @if($errors->has('bidangahli'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bidangahli') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="rekognisi">Nama Rekognisi</label>
                <input class="form-control {{ $errors->has('rekognisi') ? 'is-invalid' : '' }}" type="text" name="rekognisi" id="rekognisi" value="{{ old('rekognisi', '') }}">
                @if($errors->has('rekognisi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rekognisi') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tingkat Rekognisi</label>
                <select class="form-control {{ $errors->has('tingkat_reg') ? 'is-invalid' : '' }}" name="tingkat_reg" id="tingkat_reg">
                    <option value disabled {{ old('tingkat_reg', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih') }}</option>
                    @foreach(App\Models\Rekognisi::TINGKAT_REG_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tingkat_reg', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tingkat_reg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tingkat_reg') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Jenis Rekognisi</label>
                <select class="form-control {{ $errors->has('jenis_reko') ? 'is-invalid' : '' }}" name="jenis_reko" id="jenis_reko">
                    <option value disabled {{ old('jenis_reko', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih') }}</option>
                    @foreach(App\Models\Rekognisi::JENIS_REKO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_reko', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_reko'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis_reko') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tahun Akademik</label>
                <select class="form-control {{ $errors->has('akademik') ? 'is-invalid' : '' }}" name="akademik" id="akademik">
                    <option value disabled {{ old('akademik', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih') }}</option>
                    @foreach(App\Models\Rekognisi::AKADEMIK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('akademik', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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