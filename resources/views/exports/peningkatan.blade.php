<table>
    <thead>
        <tr>
            <th style="text-align: center; font-size: 18mm" colspan="11">
                <h1>Data Peningkatan kompetensi Dosen</h1>
            </th>
        </tr>
        <tr>
            <th style="text-align: center;" rowspan='2'>No</th>
            <th style="text-align: center;" rowspan='2'>Nama Dosen</th>
            <th style="text-align: center;" rowspan='2'>Nama Kegiatan</th>
            <th style="text-align: center;" rowspan='2'>Jenis Kegiatan</th>
            <th style="text-align: center;" rowspan='2'>Tempat</th>
            <th style="text-align: center;" rowspan='2'>Waktu</th>
            <th style="text-align: center;" colspan='2'>Sebagai</th>
            <th style="text-align: center;" colspan='3'>Tingkat</th>
        </tr>
        <tr>
            <td style="text-align: center;">Penyaji</td>
            <td style="text-align: center;">Peserta</td>
            <td style="text-align: center;">Wilayah</td>
            <td style="text-align: center;">Nasional</td>
            <td style="text-align: center;">Internasional</td>
        </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($peningkatans as $d)
            <tr>
                <td style="text-align: center">
                    {{ $no++ }}
                </td>
                <td>
                    {{ $d->biodata->nik->name }}
                </td>
                <td>
                    {{ $d->nama_kegiatan }}
                </td>
                <td>
                    {{ $d->jenis_kegiatan }}
                </td>
                <td>
                    {{ $d->tempat }}
                </td>
                <td>
                    {{ $d->tgl_mulai }}
                </td>
                @if ($d->peran === "Penyaji")
                    <td style="text-align: center">V</td>
                    <td style="text-align: center">-</td>
                @endif
                @if ($d->peran === "Peserta")
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">V</td>
                @endif
                @if ($d->tingkatan_kegiatan === "Lokal")
                    <td style="text-align: center">V</td>
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">-</td>
                @endif
                @if ($d->tingkatan_kegiatan === "Nasional")
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">V</td>
                    <td style="text-align: center">-</td>
                @endif
                @if ($d->tingkatan_kegiatan === "Internasional")
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">V</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
