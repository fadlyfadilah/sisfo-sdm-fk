@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Lihat Data Diri
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.biodata.index') }}">
                    Kembali Ke Daftar
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $biodatum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NIK
                        </th>
                        <td>
                            {{ $biodatum->nik->nik ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <td>
                            {{ $biodatum->nik->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Photo Profil
                        </th>
                        <td>
                            <img src="{{ asset("/storage/".$biodatum->image) }}" alt="" width="128px">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NIDN
                        </th>
                        <td>
                            {{ $biodatum->nidn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            FIle NIDN
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$biodatum->nidn_file) }}">{{ $biodatum->nidn_file }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jenis Kelamin
                        </th>
                        <td>
                            {{ App\Models\Biodatum::JK_SELECT[$biodatum->jk] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tempat Lahir
                        </th>
                        <td>
                            {{ $biodatum->tl }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal Lahir
                        </th>
                        <td>
                            {{ $biodatum->tgl }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NIK (No, KTP)
                        </th>
                        <td>
                            {{ $biodatum->noktp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            File NIK (No, KTP)
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$biodatum->filektp) }}">{{ $biodatum->filektp }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Agama
                        </th>
                        <td>
                            {{ $biodatum->agama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kewarganegaraan
                        </th>
                        <td>
                            {{ $biodatum->kewarnegaraan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status Pernikahan
                        </th>
                        <td>
                            {{ $biodatum->status_nikah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Suami/Istri
                        </th>
                        <td>
                            {{ $biodatum->suami_istri }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NIP Suami/Istri
                        </th>
                        <td>
                            {{ $biodatum->nipsuami_istri }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Pekerjaan Suami/Istri	

                        </th>
                        <td>
                            {{ $biodatum->pekerjaan_suami_istri }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Terhitung Mulai Tanggal PNS Suami/Istri
                        </th>
                        <td>
                            {{ $biodatum->pns_suami_istri }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Pendidikan Terakhir S2
                        </th>
                        <td>
                            {{ $biodatum->pendikteks2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Pendidikan Terakhir S3
                        </th>
                        <td>
                            {{ $biodatum->pendikteks3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor Sertifikat Pendidik
                        </th>
                        <td>
                            {{ $biodatum->nosertipen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor Sertifikat Kompetensi
                        </th>
                        <td>
                            {{ $biodatum->nosertikom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bidang Keilmuan ke-1
                        </th>
                        <td>
                            {{ $biodatum->bidangke_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bidang Keilmuan ke-2
                        </th>
                        <td>
                            {{ $biodatum->bidangke_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Home Base
                        </th>
                        <td>
                            {{ App\Models\Biodatum::HOMEBASE_SELECT[$biodatum->homebase] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{ $biodatum->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Almat
                        </th>
                        <td>
                            {{ $biodatum->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            RT
                        </th>
                        <td>
                            {{ $biodatum->rt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            RW
                        </th>
                        <td>
                            {{ $biodatum->rw }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dusun
                        </th>
                        <td>
                            {{ $biodatum->dusun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Desa/Kelurahan
                        </th>
                        <td>
                            {{ $biodatum->desa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kota/Kabupaten
                        </th>
                        <td>
                            {{ $biodatum->kota }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Provinsi
                        </th>
                        <td>
                            {{ $biodatum->provinsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kode Pos
                        </th>
                        <td>
                            {{ $biodatum->kodepos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor Telp. Rumah
                        </th>
                        <td>
                            {{ $biodatum->telp_rumah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No. HP
                        </th>
                        <td>
                            {{ $biodatum->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Program Studi
                        </th>
                        <td>
                            {{ $biodatum->prodi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NIP (Khusus PNS)
                        </th>
                        <td>
                            {{ $biodatum->nip_pns }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status Kepegawaian
                        </th>
                        <td>
                            {{ App\Models\Biodatum::STATUSKEP_SELECT[$biodatum->statuskep] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Rumah Sakit/Institusi
                        </th>
                        <td>
                            {{ $biodatum->institusi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bagian
                        </th>
                        <td>
                            {{ $biodatum->bagian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status Keaktifan
                        </th>
                        <td>
                            {{ $biodatum->status_aktif }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SK Yayasan *80,100% atau SPK Perjanjian Kerja (Surat Perpanjangan Kontrak)
                        </th>
                        <td>
                            {{ $biodatum->noskyayasan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SK Yayasan *80,100% atau SPK Perjanjian Kerja (Surat Perpanjangan Kontrak) Terhitung Mulai Tanggal
                        </th>
                        <td>
                            {{ $biodatum->ttg_sk_yayasan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SK Yayasan *80,100% atau SPK Perjanjian Kerja (Surat Perpanjangan Kontrak) File Doc
                        </th>
                        <td>
                            <a href="{{ asset("/storage/".$biodatum->sk_yayasandoc) }}">{{ $biodatum->sk_yayasandoc }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor SK TMT Masuk ke Unisba
                        </th>
                        <td>
                            {{ $biodatum->nomor_sktmt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal Mulai Menjadi Dosen
                        </th>
                        <td>
                            {{ $biodatum->tgl_sktmt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sumber Gaji
                        </th>
                        <td>
                            {{ $biodatum->sumber_gaji }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NPWP
                        </th>
                        <td>
                            {{ $biodatum->npwp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Wajip Pajak
                        </th>
                        <td>
                            {{ $biodatum->pajak }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jabatan
                        </th>
                        <td>
                            {{ $biodatum->jabatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Matakuliah yang diampu
                        </th>
                        <td>
                            {{ $biodatum->matkul }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.biodata.index') }}">
                    Kembali Ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection