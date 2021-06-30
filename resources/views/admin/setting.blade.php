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
    </div>
@endsection
