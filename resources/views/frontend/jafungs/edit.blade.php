@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jafung.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("frontend.jafungs.update", [$jafung->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Jabatan Fungsional</label>
                <select class="form-control {{ $errors->has('jab_fung') ? 'is-invalid' : '' }}" name="jab_fung" id="jab_fung">
                    <option value disabled {{ old('jab_fung', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Jafung::JAB_FUNG_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jab_fung', $jafung->jab_fung) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jab_fung'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jab_fung') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_skjab">No SK.</label>
                <input class="form-control {{ $errors->has('no_skjab') ? 'is-invalid' : '' }}" type="text" name="no_skjab" id="no_skjab" value="{{ old('no_skjab', $jafung->no_skjab) }}">
                @if($errors->has('no_skjab'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_skjab') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tmt_jab">Terhitung Mulai Tanggal</label>
                <input class="form-control date {{ $errors->has('tmt_jab') ? 'is-invalid' : '' }}" type="text" name="tmt_jab" id="tmt_jab" value="{{ old('tmt_jab', $jafung->tmt_jab) }}">
                @if($errors->has('tmt_jab'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tmt_jab') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="leb_ajar">Kelebihan Pengajaran}</label>
                <input class="form-control {{ $errors->has('leb_ajar') ? 'is-invalid' : '' }}" type="text" name="leb_ajar" id="leb_ajar" value="{{ old('leb_ajar', $jafung->leb_ajar) }}">
                @if($errors->has('leb_ajar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leb_ajar') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="leb_pen">Kelebihan Penelitian</label>
                <input class="form-control {{ $errors->has('leb_pen') ? 'is-invalid' : '' }}" type="text" name="leb_pen" id="leb_pen" value="{{ old('leb_pen', $jafung->leb_pen) }}">
                @if($errors->has('leb_pen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leb_pen') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="leb_pkm">Kelebihan PKM</label>
                <input class="form-control {{ $errors->has('leb_pkm') ? 'is-invalid' : '' }}" type="text" name="leb_pkm" id="leb_pkm" value="{{ old('leb_pkm', $jafung->leb_pkm) }}">
                @if($errors->has('leb_pkm'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leb_pkm') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="leb_penun">Kelebihan Penunjang</label>
                <input class="form-control {{ $errors->has('leb_penun') ? 'is-invalid' : '' }}" type="text" name="leb_penun" id="leb_penun" value="{{ old('leb_penun', $jafung->leb_penun) }}">
                @if($errors->has('leb_penun'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leb_penun') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="file_jabfung">Upload File Jabatan Fungsional}</label>
                <input class="form-control-file {{ $errors->has('file_jabfung') ? 'is-invalid' : '' }}" type="file" name="file_jabfung" id="file_jabfung" value="{{ old('file_jabfung', $jafung->file_jabfung) }}">
                @if($errors->has('file_jabfung'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_jabfung') }}
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