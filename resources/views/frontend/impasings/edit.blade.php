@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        Ubah Inpassing
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("frontend.impasings.update", [$impasing->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="biodata_id" value="{{ auth()->user()->id }}">
            <div class="form-group">
                <label>Golongan/Pangkat</label>
                <select class="form-control {{ $errors->has('gol') ? 'is-invalid' : '' }}" name="gol" id="gol">
                    <option value disabled {{ old('gol', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Impasing::GOL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gol', $impasing->gol) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gol'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gol') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="nomorskin">Nomor SK Impassing</label>
                <input class="form-control {{ $errors->has('nomorskin') ? 'is-invalid' : '' }}" type="text" name="nomorskin" id="nomorskin" value="{{ old('nomorskin', $impasing->nomorskin) }}">
                @if($errors->has('nomorskin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomorskin') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tgl_skin">Tanggal SK</label>
                <input class="form-control date {{ $errors->has('tgl_skin') ? 'is-invalid' : '' }}" type="text" name="tgl_skin" id="tgl_skin" value="{{ old('tgl_skin', $impasing->tgl_skin) }}">
                @if($errors->has('tgl_skin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tgl_skin') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tmtskin">Terhitung Mulai Tanggal</label>
                <input class="form-control date {{ $errors->has('tmtskin') ? 'is-invalid' : '' }}" type="text" name="tmtskin" id="tmtskin" value="{{ old('tmtskin', $impasing->tmtskin) }}">
                @if($errors->has('tmtskin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tmtskin') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="angka_kredit">Angka Kredit</label>
                <input class="form-control {{ $errors->has('angka_kredit') ? 'is-invalid' : '' }}" type="text" name="angka_kredit" id="angka_kredit" value="{{ old('angka_kredit', $impasing->angka_kredit) }}">
                @if($errors->has('angka_kredit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('angka_kredit') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="masa_kerja">Masa Kerja (Tahun)</label>
                <input class="form-control {{ $errors->has('masa_kerja') ? 'is-invalid' : '' }}" type="text" name="masa_kerja" id="masa_kerja" value="{{ old('masa_kerja', $impasing->masa_kerja) }}">
                @if($errors->has('masa_kerja'))
                    <div class="invalid-feedback">
                        {{ $errors->first('masa_kerja') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="masa_bulan">Masa Kerja (Bulan)</label>
                <input class="form-control {{ $errors->has('masa_bulan') ? 'is-invalid' : '' }}" type="text" name="masa_bulan" id="masa_bulan" value="{{ old('masa_bulan', $impasing->masa_bulan) }}">
                @if($errors->has('masa_bulan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('masa_bulan') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="upload_skin">Upload Dokumen</label>
                <input class="form-control-file {{ $errors->has('upload_skin') ? 'is-invalid' : '' }}" type="file" name="upload_skin" id="upload_skin" value="{{ old('upload_skin', $impasing->upload_skin) }}">
                @if($errors->has('upload_skin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('upload_skin') }}
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