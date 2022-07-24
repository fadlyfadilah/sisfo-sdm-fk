<table>
    <thead>
        <tr>
            <th style="text-align: center; font-size: 18mm" colspan="16">
                <h1>Data Dosen AMI</h1>
            </th>
        </tr>
        <tr>
            <th style="text-align: center; font-weight: bold">NO.</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Homebase</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Nama</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Status Kepegawaian</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">NIDN/NIDK</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Magister/Magister Terapan/Spesialis</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Doktor/Doktor Terapan/Spesialis</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Bidang Keahlian 1</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Bidang Keahlian 2</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Kesesuaian Dengan Kompetensi Inti/PS</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Jabatan Akademik</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Sertifikat Pendidik Profesional</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Sertifikat Kompetensi/Profesi/Industri</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Mata Kuliah yang diampu pada PS yang diakreditasi</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Kesesuaian Bidang Keahlian dengan mata kuliah yang diampu</th>
            <th style="text-align: center; font-weight: bold; word-wrap: break-word;">Mata Kuliah yang di ampu pada PS lain</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($biodatas as $biodata)
            <tr>
                <td style="text-align: center">
                    {{ $no++ }}
                </td>
                <td>
                    {{ $biodata->homebase }}
                </td>
                <td>
                    {{ $biodata->nik->name }}
                </td>
                <td>
                    {{ $biodata->statuskep }}
                </td>
                <td>
                    {{ $biodata->nidn }}
                </td>
                <td>
                    {{ $biodata->pendikteks2 }}
                </td>
                <td>
                    {{ $biodata->pendikteks3 }}
                </td>
                <td>
                    {{ $biodata->bidangke_1 }}
                </td>
                <td>
                    {{ $biodata->bidangke_2 }}
                </td>
                <td>
                    
                </td>
                <td>
                    {{ $biodata->jabfungtek }}
                </td>
                <td>
                    {{ $biodata->nosertipen }}
                </td>
                <td>
                    {{ $biodata->nosertikom }}
                </td>
                <td>
                    {{ $biodata->matkul }}
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
