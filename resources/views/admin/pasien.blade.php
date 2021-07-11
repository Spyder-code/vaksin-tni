@extends('layouts.admin')
@section('page','Dashboard')
@section('breadcrumb')
    <li><a href="#" class="fw-normal">Dashboard</a></li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="d-flex my-3">
                <div class="mx-2">
                    <a href="{{ route('export') }}" class="btn btn-success">Export</a>
                </div>
                <div class="mx-2">
                    <a href="{{ route('delete') }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus semua data</a>
                </div>
            </div>
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Total pendaftar: {{ $data->count() }}</h3>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap" id="myTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Kode</th>
                                <th class="border-top-0">nik</th>
                                <th class="border-top-0">tgl_lahir</th>
                                <th class="border-top-0">no_hp</th>
                                <th class="border-top-0">nama</th>
                                <th class="border-top-0">alamat</th>
                                <th class="border-top-0">kelurahan</th>
                                <th class="border-top-0">kecamatan</th>
                                <th class="border-top-0">keluarga_besar_tni</th>
                                <th class="border-top-0">Tanggal daftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->tgl_lahir }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->kelurahan }}</td>
                                <td>{{ $item->kecamatan }}</td>
                                <td>{{ $item->keluarga_besar_tni }}</td>
                                <td class="txt-oflo">{{ date('d F Y, H:i:s', strtotime($item->updated_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection
