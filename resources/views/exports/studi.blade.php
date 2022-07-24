<table>
    <thead>
        <tr>
            <th style="text-align: center; font-size: 18mm" colspan="7">
                <h1>Data Studi Lanjut Dosen</h1>
            </th>
        </tr>
        <tr>
            <th style="text-align: center">NO.</th>
            <th style="text-align: center">Nama</th>
            <th style="text-align: center">Jenjang</th>
            <th style="text-align: center">Bidang Studi</th>
            <th style="text-align: center">Universitas</th>
            <th style="text-align: center">Negara</th>
            <th style="text-align: center">Tahun Mulai</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($studis as $s)
            <tr>
                <td style="text-align: center">
                    {{ $no++ }}
                </td>
                <td>
                    {{ $s->biodata->nik->name }}
                </td>
                <td>
                    {{ $s->jenjang }}
                </td>
                <td>
                    {{ $s->bidang_studi }}
                </td>
                <td>
                    {{ $s->univ }}
                </td>
                <td>
                    {{ $s->negara }}
                </td>
                <td>
                    {{ $s->mulai }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
