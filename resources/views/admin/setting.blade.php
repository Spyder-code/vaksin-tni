@extends('layouts.admin')
@section('page','Blank page')
@section('breadcrumb')
    <li><a href="{{ route('home') }}" class="breadcrumb-item nav-link">Dashboard </a></li>
    <li><a href="#" class="breadcrumb-item nav-link disabled">/ </a></li>
    <li><a href="#" class="breadcrumb-item active nav-link active"> Blank</a></li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Setting </h4>
                <div class="white-box">
                    @if ($message = Session::get('success'))
                    <div class="row">
                        <div class="col mt-3">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('setting.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-label">Buka</label>
                            <input type="text" name="buka" class="form-control" value="{{ $setting->buka }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pukul</label>
                            <input type="text" name="pukul" class="form-control" value="{{ $setting->pukul }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Batas pendaftar</label>
                            <input type="number" name="batas" class="form-control" value="{{ $setting->batas }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pesan jika melebihi batas</label>
                            <textarea name="pesan" cols="30" rows="10" class="form-control">{{ $setting->pesan }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Keluarga Besar TNI</h4>
                <div class="white-box">
                    <div class="">
                        <form action="{{ route('keluarga.add') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>Nama Keluarga</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="col-2">
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-success"><i class="fas fa-save"></i> Tambahkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Nama keluarga</th>
                                    <th class="border-top-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <form action="{{ route('keluarga.delete',['id'=>$item->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
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
