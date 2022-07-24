<table>
    <thead>
        <tr>
            <th style="text-align: center; font-size: 18mm" colspan="11">
                <h1>Data Dosen Tidak Tetap</h1>
            </th>
        </tr>
        <tr>
            <th style="text-align: center">NO.</th>
            <th style="text-align: center">Nama</th>
            <th style="text-align: center">NIDN/NIDK</th>
            <th style="text-align: center">Tempat Lahir</th>
            <th style="text-align: center">Tanggal Lahir</th>
            <th style="text-align: center">NIK(Nomor KTP)</th>
            <th style="text-align: center">Agama</th>
            <th style="text-align: center">Kerwarganegaraan</th>
            <th style="text-align: center">Homebase</th>
            <th style="text-align: center">Alamat</th>
            <th style="text-align: center">Usia</th>
            <th style="text-align: center">Masa Kerja</th>
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
                    {{ $biodata->nik->name }}
                </td>
                <td>
                    {{ $biodata->nidn }}
                </td>
                <td>
                    {{ $biodata->tl }}
                </td>
                <td>
                    {{ $biodata->tgl }}
                </td>
                <td>
                    {{ $biodata->noktp }}
                </td>
                <td>
                    {{ $biodata->agama }}
                </td>
                <td>
                    {{ $biodata->Kewarnegaraan }}
                </td>
                <td>
                    {{ $biodata->homebase }}
                </td>
                <td>
                    {{ $biodata->alamat }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($biodata->tgl)->diff()->y }} Tahun
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($biodata->tgl_sktmt)->diff()->y }} Tahun
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
