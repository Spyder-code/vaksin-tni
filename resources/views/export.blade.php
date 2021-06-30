<table>
    <thead>
        <tr>
            <th>#</th>
            <th>nik</th>
            <th>tgl_lahir</th>
            <th>no_hp</th>
            <th>nama</th>
            <th>alamat</th>
            <th>kelurahan</th>
            <th>kecamatan</th>
            <th>keluarga_besar_tni</th>
            <th>Tanggal daftar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>nik-{{ $item->nik }}</td>
            <td>{{ date('d/m/Y', strtotime($item->tgl_lahir)) }}</td>
            <td>{{ $item->no_hp }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->kelurahan }}</td>
            <td>{{ $item->kecamatan }}</td>
            <td>{{ $item->keluarga_besar_tni }}</td>
            <td>{{ date('d F Y, H:i:s', strtotime($item->updated_at)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>