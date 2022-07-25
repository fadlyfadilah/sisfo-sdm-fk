@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Studi
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("frontend.studis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="jenjang">Jenjang</label>
                <input class="form-control {{ $errors->has('jenjang') ? 'is-invalid' : '' }}" type="text" name="jenjang" id="jenjang" value="{{ old('jenjang', '') }}">
                @if($errors->has('jenjang'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenjang') }}
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
                <label for="univ">Universitas</label>
                <input class="form-control {{ $errors->has('univ') ? 'is-invalid' : '' }}" type="text" name="univ" id="univ" value="{{ old('univ', '') }}">
                @if($errors->has('univ'))
                    <div class="invalid-feedback">
                        {{ $errors->first('univ') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="negara">Negara</label>
                <input class="form-control {{ $errors->has('negara') ? 'is-invalid' : '' }}" type="text" name="negara" id="negara" value="{{ old('negara', '') }}">
                @if($errors->has('negara'))
                    <div class="invalid-feedback">
                        {{ $errors->first('negara') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="mulai">Tahun Mulai</label>
                <input class="form-control {{ $errors->has('mulai') ? 'is-invalid' : '' }}" type="text" name="mulai" id="mulai" value="{{ old('mulai', '') }}">
                @if($errors->has('mulai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mulai') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tahun Akademik</label>
                <select class="form-control {{ $errors->has('akademik') ? 'is-invalid' : '' }}" name="akademik" id="akademik">
                    <option value disabled {{ old('akademik', null) === null ? 'selected' : '' }}>{{ trans('Silahkan Pilih') }}</option>
                    @foreach(App\Models\Studi::AKADEMIK_SELECT as $key => $label)
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