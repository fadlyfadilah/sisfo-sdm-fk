<table>
    <thead>
        <tr>
            <th style="text-align: center; font-size: 18mm" colspan="8">
                <h1>Data Rekognisi Dosen</h1>
            </th>
        </tr>
        <tr>
            <th style="text-align: center;" rowspan='2'>No</th>
            <th style="text-align: center;" rowspan='2'>Nama Dosen</th>
            <th style="text-align: center;" rowspan='2'>Bidang Ahli</th>
            <th style="text-align: center;" rowspan='2'>Nama Rekognisi</th>
            <th style="text-align: center;" rowspan='2'>Jenis Rekognisi</th>
            <th style="text-align: center;" colspan='3'>Tingkat</th>
        </tr>
        <tr>
            <td style="text-align: center;">Wilayah</td>
            <td style="text-align: center;">Nasional</td>
            <td style="text-align: center;">Internasional</td>
        </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($rekognisis as $d)
            <tr>
                <td style="text-align: center">
                    {{ $no++ }}
                </td>
                <td>
                    {{ $d->biodata->nik->name }}
                </td>
                <td>
                    {{ $d->bidangahli }}
                </td>
                <td>
                    {{ $d->rekognisi }}
                </td>
                <td>
                    {{ $d->jenis_reko }}
                </td>
                @if ($d->tingkat_reg === "Wilayah")
                    <td style="text-align: center">V</td>
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">-</td>
                @endif
                @if ($d->tingkat_reg === "Nasional")
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">V</td>
                    <td style="text-align: center">-</td>
                @endif
                @if ($d->tingkat_reg === "Internasional")
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">V</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
