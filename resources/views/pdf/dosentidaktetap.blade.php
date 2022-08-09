<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css.css') }}">
    <title></title>
</head>

<body>
    <div>
        <table class="table">
            <tr>
                <td rowspan="4" class="td img"><img src="{{ asset('logo_unisba.png') }}" width="50"></td>
                <td class="td judul" rowspan="2">Formulir</td>
                <td class="td reset">Kode/No</td>
                <td class="td reset">:</td>
                <td class="td reset">DF-PD-SPMI</td>
            </tr>
            <tr>
                <td class="td reset">Revisi</td>
                <td class="td reset">:</td>
                <td class="td reset">1</td>
            </tr>
            <tr>
                <td class="td judul" rowspan="2">Daftar Dosen Tidak Tetap</td>
                <td class="td reset">Tanggal</td>
                <td class="td reset">:</td>
                <td class="td reset">27 November 2022</td>
            </tr>
            <tr>
                <td class="td reset">Unit</td>
                <td class="td reset">:</td>
                <td class="td reset">Fakultas/Pascasarjana</td>
            </tr>
        </table>

    </div>
    <table class="table2">
        <tr>
            <td>Unit Pengelola Program Studi</td>
            <td>:</td>
            <td>Fakultas MIPA</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td>MIPA</td>
        </tr>
        <tr>
            <td>Tahun Akademik</td>
            <td>:</td>
            <td>2020/2021</td>
        </tr>
    </table>

    <table class="table3">
        <tr>
            <th width="3%" class="td">No.</th>
            <th width="8%" class="td">Nama Dosen</th>
            <th width="1%" class="td">NIDN/NIDK</th>
            <th width="5%" class="td">Pendidikan Pasca Sarjana</th>
            <th width="10%" class="td">Bidang Keahlian</th>
            <th width="8%" class="td">Jabatan Akademik</th>
            <th width="8%" class="td">Sertifikat Pendidik Profesional</th>
            <th width="3%" class="td">Sertifikat Profesi/Kompetensi/Industri</th>
            <th width="10%" class="td">Mata Kuliah yang diampu pada PS yang Diakreditasi</th>
            <th width="3%" class="td">Kesesuaian Bidang Keahlian dengan Matakuliah yang diampu</th>
        </tr>
        @php
            $no=1;
        @endphp
        @foreach ($datas as $data)
            <tr>
                <td class="td">{{ $no++ }}</td>
                <td class="td">{{ $data->nik->name }}</td>
                <td class="td">1</td>
                <td class="td">1</td>
                <td class="td">1</td>
                <td class="td">1</td>
                <td class="td">1</td>
                <td class="td">1</td>
                <td class="td">1</td>
                <td class="td">1</td>
            </tr>
        @endforeach
    </table>

    <table class="table4">
        <tr>
            <th class="td catatan">Catatan :</th>
            <th class="td catatan1">DiperiksaOleh,</th>
            <th class="td catatan1">DipersiapkanOleh,</th>
        </tr>
        <tr>
            <td></td>
            <th class="td catatan2">Wakil DekanI/Asisten DirekturPascasarjana,</th>
            <th class="td catatan2">StafAkademik,</th>
        </tr>
        <tr>
            <td class="td" style="border-top: 0;border-bottom: 0;" height="140"></td>
            <td class="td" height="140"></td>
            <td class="td" height="140"></td>
        </tr>
        <tr>
            <td style="border-top: 0;"></td>
            <td class="td">Tanggal :</td>
            <td class="td">Tanggal :</td>
        </tr>
    </table>
</body>

</html>
