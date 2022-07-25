@extends('layouts.frontend')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <div class="card-header"><b>Profil</b></div>
                </div>
                <div class="col-md-1 ">
                    <a href="{{ route('frontend.biodata.store') }}"
                        onclick="event.preventDefault();
                    document.getElementById('profil').submit();"
                        class="btn btn-success"><i class="fa-fw far fa-edit"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form id="profil" enctype="multipart/form-data" method="POST" action="{{ route('frontend.biodata.store') }}"
                enctype="multipart/form-data">
                @csrf
                <img class="rounded mx-auto d-block"
                    src="{{ $biodata != null ? asset('/storage/' . $biodata->image) : asset('no-image.jpeg') }}"
                    width="268px" alt="">
                <div class="form-group">
                    <label for="image">Photo Profil</label>
                    <input class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file"
                        name="image" id="image" value="{{ old('image', '') }}">
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input class="form-control {{ $errors->has('nidn') ? 'is-invalid' : '' }}" type="text" name="nidn"
                        id="nidn" value="{{ old('nidn', $biodata->nidn ?? '') }}">
                    @if ($errors->has('nidn'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nidn') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nidn_file">File NIDN</label>
                    <input class="form-control-file {{ $errors->has('nidn_file') ? 'is-invalid' : '' }}" type="file"
                        name="nidn_file" id="nidn_file" value="{{ old('nidn_file', $biodata->nidn_file ?? '') }}">
                    <a
                        href="{{ $biodata != null ? asset('/storage/' . $biodata->nidn_file) : '' }}">{{ $biodata->nidn_file ?? '' }}</a>
                    @if ($errors->has('nidn_file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nidn_file') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control {{ $errors->has('jk') ? 'is-invalid' : '' }}" name="jk"
                        id="jk">
                        <option value disabled {{ old('jk', null) === null ? 'selected' : '' }}>Silahkan Pilih
                        </option>
                        @foreach (App\Models\Biodatum::JK_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('jk', $biodata->jk ?? '') === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('jk'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jk') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tl">Tempat Lahir</label>
                    <input class="form-control {{ $errors->has('tl') ? 'is-invalid' : '' }}" type="text" name="tl"
                        id="tl" value="{{ old('tl', $biodata->tl ?? '') }}">
                    @if ($errors->has('tl'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tl') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal Lahir</label>
                    <input class="form-control date {{ $errors->has('tgl') ? 'is-invalid' : '' }}" type="text"
                        name="tgl" id="tgl" value="{{ old('tgl', $biodata->tgl ?? '') }}">
                    @if ($errors->has('tgl'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tgl') }}
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <b>Kependudukan</b>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('frontend.biodata.storekep') }}"
                        onclick="event.preventDefault();
                    document.getElementById('kependudukan').submit();"
                        class="btn btn-success"><i class="fa-fw far fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="kependudukan" enctype="multipart/form-data" method="POST"
                action="{{ route('frontend.biodata.storekep') }}">
                @csrf
                <div class="form-group">
                    <label for="noktp">NIK(No.KTP)</label>
                    <input class="form-control {{ $errors->has('noktp') ? 'is-invalid' : '' }}" type="text"
                        name="noktp" id="noktp" value="{{ old('noktp', $biodata->noktp ?? '') }}">
                    @if ($errors->has('noktp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('noktp') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="filektp">File NIK(No.KTP)</label>
                    <input class="form-control-file {{ $errors->has('filektp') ? 'is-invalid' : '' }}" type="file"
                        name="filektp" id="filektp" value="{{ old('filektp', $biodata->filektp ?? '') }}">
                    <a
                        href="{{ $biodata != null ? asset('/storage/' . $biodata->filektp) : '' }}">{{ $biodata->filektp ?? '' }}</a>
                    @if ($errors->has('filektp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('filektp') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input class="form-control {{ $errors->has('agama') ? 'is-invalid' : '' }}" type="text"
                        name="agama" id="agama" value="{{ old('agama', $biodata->agama ?? '') }}">
                    @if ($errors->has('agama'))
                        <div class="invalid-feedback">
                            {{ $errors->first('agama') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="kewarnegaraan">Kewarganegaraan</label>
                    <input class="form-control {{ $errors->has('kewarnegaraan') ? 'is-invalid' : '' }}" type="text"
                        name="kewarnegaraan" id="kewarnegaraan"
                        value="{{ old('kewarnegaraan', $biodata->kewarnegaraan ?? '') }}">
                    @if ($errors->has('kewarnegaraan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kewarnegaraan') }}
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <b>Keluarga</b>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('frontend.biodata.storekel') }}"
                        onclick="event.preventDefault();
                document.getElementById('keluarga').submit();"
                        class="btn btn-success"><i class="fa-fw far fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="keluarga" enctype="multipart/form-data" method="POST"
                action="{{ route('frontend.biodata.storekel') }}">
                @csrf
                <div class="form-group">
                    <label for="status_nikah">Status Perkawinan</label>
                    <input class="form-control {{ $errors->has('status_nikah') ? 'is-invalid' : '' }}" type="text"
                        name="status_nikah" id="status_nikah"
                        value="{{ old('status_nikah', $biodata->status_nikah ?? '') }}">
                    @if ($errors->has('status_nikah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status_nikah') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="suami_istri">Nama Suami/Istri</label>
                    <input class="form-control {{ $errors->has('suami_istri') ? 'is-invalid' : '' }}" type="text"
                        name="suami_istri" id="suami_istri"
                        value="{{ old('suami_istri', $biodata->suami_istri ?? '') }}">
                    @if ($errors->has('suami_istri'))
                        <div class="invalid-feedback">
                            {{ $errors->first('suami_istri') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nipsuami_istri">NIP Suami/Istri</label>
                    <input class="form-control {{ $errors->has('nipsuami_istri') ? 'is-invalid' : '' }}" type="text"
                        name="nipsuami_istri" id="nipsuami_istri"
                        value="{{ old('nipsuami_istri', $biodata->nipsuami_istri ?? '') }}">
                    @if ($errors->has('nipsuami_istri'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nipsuami_istri') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pekerjaan_suami_istri">Pekerjaan Suami/Istri</label>
                    <input class="form-control {{ $errors->has('pekerjaan_suami_istri') ? 'is-invalid' : '' }}"
                        type="text" name="pekerjaan_suami_istri" id="pekerjaan_suami_istri"
                        value="{{ old('pekerjaan_suami_istri', $biodata->pekerjaan_suami_istri ?? '') }}">
                    @if ($errors->has('pekerjaan_suami_istri'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pekerjaan_suami_istri') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pns_suami_istri">Terhitung Mulai Tanggal PNS Suami/Istri</label>
                    <input class="form-control date {{ $errors->has('pns_suami_istri') ? 'is-invalid' : '' }}"
                        type="text" name="pns_suami_istri" id="pns_suami_istri"
                        value="{{ old('pns_suami_istri', $biodata->pns_suami_istri ?? '') }}">
                    @if ($errors->has('pns_suami_istri'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pns_suami_istri') }}
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <b>Bidang Ahli</b>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('frontend.biodata.storebid') }}"
                        onclick="event.preventDefault();
                document.getElementById('bidang').submit();"
                        class="btn btn-success"><i class="fa-fw far fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="bidang" enctype="multipart/form-data" method="POST"
                action="{{ route('frontend.biodata.storebid') }}">
                @csrf
                <div class="form-group">
                    <label for="pendikteks2">Pendidikan Terakhir S2</label>
                    <input class="form-control {{ $errors->has('pendikteks2') ? 'is-invalid' : '' }}" type="text"
                        name="pendikteks2" id="pendikteks2"
                        value="{{ old('pendikteks2', $biodata->pendikteks2 ?? '') }}">
                    @if ($errors->has('pendikteks2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pendikteks2') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pendikteks3">Pendidikan Terakhir S3</label>
                    <input class="form-control {{ $errors->has('pendikteks3') ? 'is-invalid' : '' }}" type="text"
                        name="pendikteks3" id="pendikteks3"
                        value="{{ old('pendikteks3', $biodata->pendikteks3 ?? '') }}">
                    @if ($errors->has('pendikteks3'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pendikteks3') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nosertipen">Nomor Sertifikat Pendidik</label>
                    <input class="form-control {{ $errors->has('nosertipen') ? 'is-invalid' : '' }}" type="text"
                        name="nosertipen" id="nosertipen" value="{{ old('nosertipen', $biodata->nosertipen ?? '') }}">
                    @if ($errors->has('nosertipen'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nosertipen') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nosertikom">Nomor Sertifikat Kompetensi</label>
                    <input class="form-control {{ $errors->has('nosertikom') ? 'is-invalid' : '' }}" type="text"
                        name="nosertikom" id="nosertikom" value="{{ old('nosertikom', $biodata->nosertikom ?? '') }}">
                    @if ($errors->has('nosertikom'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nosertikom') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="bidangke_1">Bidang Ahli 1</label>
                    <input class="form-control {{ $errors->has('bidangke_1') ? 'is-invalid' : '' }}" type="text"
                        name="bidangke_1" id="bidangke_1" value="{{ old('bidangke_1', $biodata->bidangke_1 ?? '') }}">
                    @if ($errors->has('bidangke_1'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bidangke_1') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="bidangke_2">Bidang Ahli 2</label>
                    <input class="form-control {{ $errors->has('bidangke_2') ? 'is-invalid' : '' }}" type="text"
                        name="bidangke_2" id="bidangke_2" value="{{ old('bidangke_2', $biodata->bidangke_2 ?? '') }}">
                    @if ($errors->has('bidangke_2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bidangke_2') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Home Base</label>
                    <select class="form-control {{ $errors->has('homebase') ? 'is-invalid' : '' }}" name="homebase"
                        id="homebase">
                        <option value disabled {{ old('homebase', null) === null ? 'selected' : '' }}>
                            {{ trans('Silahkan Pilih!') }}</option>
                        @foreach (App\Models\Biodatum::HOMEBASE_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('homebase', $biodata->homebase ?? '') === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('homebase'))
                        <div class="invalid-feedback">
                            {{ $errors->first('homebase') }}
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <b>Alamat dan Kontrak</b>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('frontend.biodata.storeala') }}"
                        onclick="event.preventDefault();
                document.getElementById('alamat').submit();"
                        class="btn btn-success"><i class="fa-fw far fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="alamat" enctype="multipart/form-data" method="POST"
                action="{{ route('frontend.biodata.storeala') }}">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" id="email" value="{{ old('email', $biodata->email ?? '') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat', $biodata->alamat ?? '') }}</textarea>
                    @if ($errors->has('alamat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('alamat') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="rt">RT</label>
                    <input class="form-control {{ $errors->has('rt') ? 'is-invalid' : '' }}" type="text"
                        name="rt" id="rt" value="{{ old('rt', $biodata->rt ?? '') }}">
                    @if ($errors->has('rt'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rt') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="rw">RW</label>
                    <input class="form-control {{ $errors->has('rw') ? 'is-invalid' : '' }}" type="text"
                        name="rw" id="rw" value="{{ old('rw', $biodata->rw ?? '') }}">
                    @if ($errors->has('rw'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rw') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="dusun">Dusun</label>
                    <input class="form-control {{ $errors->has('dusun') ? 'is-invalid' : '' }}" type="text"
                        name="dusun" id="dusun" value="{{ old('dusun', $biodata->dusun ?? '') }}">
                    @if ($errors->has('dusun'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dusun') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="desa">Desa/Kelurahan</label>
                    <input class="form-control {{ $errors->has('desa') ? 'is-invalid' : '' }}" type="text"
                        name="desa" id="desa" value="{{ old('desa', $biodata->desa ?? '') }}">
                    @if ($errors->has('desa'))
                        <div class="invalid-feedback">
                            {{ $errors->first('desa') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="kota">Kota/Kabupaten</label>
                    <input class="form-control {{ $errors->has('kota') ? 'is-invalid' : '' }}" type="text"
                        name="kota" id="kota" value="{{ old('kota', $biodata->kota ?? '') }}">
                    @if ($errors->has('kota'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kota') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input class="form-control {{ $errors->has('provinsi') ? 'is-invalid' : '' }}" type="text"
                        name="provinsi" id="provinsi" value="{{ old('provinsi', $biodata->provinsi ?? '') }}">
                    @if ($errors->has('provinsi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('provinsi') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="kodepos">Kode Pos</label>
                    <input class="form-control {{ $errors->has('kodepos') ? 'is-invalid' : '' }}" type="text"
                        name="kodepos" id="kodepos" value="{{ old('kodepos', $biodata->kodepos ?? '') }}">
                    @if ($errors->has('kodepos'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kodepos') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="telp_rumah">No. Telepon Rumah</label>
                    <input class="form-control {{ $errors->has('telp_rumah') ? 'is-invalid' : '' }}" type="text"
                        name="telp_rumah" id="telp_rumah" value="{{ old('telp_rumah', $biodata->telp_rumah ?? '') }}">
                    @if ($errors->has('telp_rumah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('telp_rumah') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="no_hp">No. HP</label>
                    <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text"
                        name="no_hp" id="no_hp" value="{{ old('no_hp', $biodata->no_hp ?? '') }}">
                    @if ($errors->has('no_hp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('no_hp') }}
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <b>Kepegawaian</b>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('frontend.biodata.storekepe') }}"
                        onclick="event.preventDefault();
                document.getElementById('kepe').submit();"
                        class="btn btn-success"><i class="fa-fw far fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="kepe" enctype="multipart/form-data" method="POST"
                action="{{ route('frontend.biodata.storekepe') }}">
                @csrf
                <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <input class="form-control {{ $errors->has('prodi') ? 'is-invalid' : '' }}" type="text"
                        name="prodi" id="prodi" value="{{ old('prodi', $biodata->prodi ?? '') }}">
                    @if ($errors->has('prodi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prodi') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nip_pns">NIP (Khusu PNS)</label>
                    <input class="form-control {{ $errors->has('nip_pns') ? 'is-invalid' : '' }}" type="text"
                        name="nip_pns" id="nip_pns" value="{{ old('nip_pns', $biodata->nip_pns ?? '') }}">
                    @if ($errors->has('nip_pns'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nip_pns') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Status Kepegawaian</label>
                    <select class="form-control {{ $errors->has('statuskep') ? 'is-invalid' : '' }}" name="statuskep"
                        id="statuskep">
                        <option value disabled {{ old('statuskep', null) === null ? 'selected' : '' }}>Silahkan
                            Pilih</option>
                        @foreach (App\Models\Biodatum::STATUSKEP_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('statuskep', $biodata->statuskep ?? '') === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('statuskep'))
                        <div class="invalid-feedback">
                            {{ $errors->first('statuskep') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="institusi">Rumah Sakit / Institusi</label>
                    <input class="form-control {{ $errors->has('institusi') ? 'is-invalid' : '' }}" type="text"
                        name="institusi" id="institusi" value="{{ old('institusi', $biodata->institusi ?? '') }}">
                    @if ($errors->has('institusi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('institusi') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="bagian">Bagian</label>
                    <input class="form-control {{ $errors->has('bagian') ? 'is-invalid' : '' }}" type="text"
                        name="bagian" id="bagian" value="{{ old('bagian', $biodata->bagian ?? '') }}">
                    @if ($errors->has('bagian'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bagian') }}
                        </div>
                    @endif
                    <span class="help-block">Bagian Di Rumah Sakit/Institusi</span>
                </div>
                <div class="form-group">
                    <label for="status_aktif">Status Keaktifan</label>
                    <input class="form-control {{ $errors->has('status_aktif') ? 'is-invalid' : '' }}" type="text"
                        name="status_aktif" id="status_aktif"
                        value="{{ old('status_aktif', $biodata->status_aktif ?? '') }}">
                    @if ($errors->has('status_aktif'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status_aktif') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="noskyayasan">SK Yayasan *80,100% atau SPK Perjanjian Kerja (Surat Perpanjangan
                        Kontrak)</label>
                    <input class="form-control {{ $errors->has('noskyayasan') ? 'is-invalid' : '' }}" type="text"
                        name="noskyayasan" id="noskyayasan"
                        value="{{ old('noskyayasan', $biodata->noskyayasan ?? '') }}">
                    @if ($errors->has('noskyayasan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('noskyayasan') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ttg_sk_yayasan">SK Yayasan *80,100% atau SPK Perjanjian Kerja (Surat Perpanjangan
                        Kontrak) Terhitung Mulai Tanggal</label>
                    <input class="form-control date {{ $errors->has('ttg_sk_yayasan') ? 'is-invalid' : '' }}"
                        type="text" name="ttg_sk_yayasan" id="ttg_sk_yayasan"
                        value="{{ old('ttg_sk_yayasan', $biodata->ttg_sk_yayasan ?? '') }}">
                    @if ($errors->has('ttg_sk_yayasan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ttg_sk_yayasan') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="sk_yayasandoc">SK Yayasan *80,100% atau SPK Perjanjian Kerja (Surat Perpanjangan
                        Kontrak) File</label>
                    <input class="form-control-file {{ $errors->has('sk_yayasandoc') ? 'is-invalid' : '' }}"
                        type="file" name="sk_yayasandoc" id="sk_yayasandoc"
                        value="{{ old('sk_yayasandoc', $biodata->sk_yayasandoc ?? '') }}">
                    <a
                        href="{{ $biodata != null ? asset('/storage/' . $biodata->sk_yayasandoc) : '' }}">{{ $biodata->sk_yayasandoc ?? '' }}</a>
                    @if ($errors->has('sk_yayasandoc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sk_yayasandoc') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nomor_sktmt">Nomor SK TMMD</label>
                    <input class="form-control {{ $errors->has('nomor_sktmt') ? 'is-invalid' : '' }}" type="text"
                        name="nomor_sktmt" id="nomor_sktmt"
                        value="{{ old('nomor_sktmt', $biodata->nomor_sktmt ?? '') }}">
                    @if ($errors->has('nomor_sktmt'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nomor_sktmt') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tgl_sktmt">Tanggal Mulai Menjadi Dosen(TMMD)</label>
                    <input class="form-control date {{ $errors->has('tgl_sktmt') ? 'is-invalid' : '' }}" type="text"
                        name="tgl_sktmt" id="tgl_sktmt" value="{{ old('tgl_sktmt', $biodata->tgl_sktmt ?? '') }}">
                    @if ($errors->has('tgl_sktmt'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tgl_sktmt') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="sumber_gaji">Sumber Gaji (NO REK)</label>
                    <input class="form-control {{ $errors->has('sumber_gaji') ? 'is-invalid' : '' }}" type="text"
                        name="sumber_gaji" id="sumber_gaji"
                        value="{{ old('sumber_gaji', $biodata->sumber_gaji ?? '') }}">
                    @if ($errors->has('sumber_gaji'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sumber_gaji') }}
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <b>Lain - Lain</b>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('frontend.biodata.storelain') }}"
                        onclick="event.preventDefault();
                document.getElementById('lain').submit();"
                        class="btn btn-success"><i class="fa-fw far fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="lain" enctype="multipart/form-data" method="POST"
                action="{{ route('frontend.biodata.storelain') }}">
                @csrf
                <div class="form-group">
                    <label for="npwp">NPWP</label>
                    <input class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }}" type="text"
                        name="npwp" id="npwp" value="{{ old('npwp', $biodata->npwp ?? '') }}">
                    @if ($errors->has('npwp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('npwp') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pajak">Nama Wajib Pajak</label>
                    <input class="form-control {{ $errors->has('pajak') ? 'is-invalid' : '' }}" type="text"
                        name="pajak" id="pajak" value="{{ old('pajak', $biodata->pajak ?? '') }}">
                    @if ($errors->has('pajak'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pajak') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input class="form-control {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" type="text"
                        name="jabatan" id="jabatan" value="{{ old('jabatan', $biodata->jabatan ?? '') }}">
                    @if ($errors->has('jabatan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jabatan') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="matkul">Matakuliah yang diampu</label>
                    <input class="form-control {{ $errors->has('matkul') ? 'is-invalid' : '' }}" type="text"
                        name="matkul" id="matkul" value="{{ old('matkul', $biodata->matkul ?? '') }}">
                    @if ($errors->has('matkul'))
                        <div class="invalid-feedback">
                            {{ $errors->first('matkul') }}
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
