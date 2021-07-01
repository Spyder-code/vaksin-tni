<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>rumkitbanmojokerto</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo-icon.png') }}">
    <link href="{{ asset('dashboard') }}/css/style.min.css" rel="stylesheet">
</head>

<body style="background-color: #dfebfd">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-primary">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h2>DAFTAR BARU VAKSIN COVID-19</h2>
                    <h3>RUMKITBAN /RS DKT MOJOKERTO</h3>
                    <p>{{ $setting->buka }}</p>
                    <P>{{ $setting->pukul }}</P>
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
                    <div class="px-2">
                        @if ($pasien>=$setting->batas)
                            <div class="justify-content-center">
                                <div class="alert alert-danger">
                                    {{ $setting->pesan }}
                                </div>
                            </div>
                        @else
                        <form action="{{ route('pasien.post') }}" method="POST" class="justify-content-center">
                            @csrf
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>NIK</label>
                                </div>
                                <div class="col-sm">
                                    <input value="{{ old('nik') }}" type="text" class="form-control" name="nik">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>Tanggal lahir</label>
                                </div>
                                <div class="col-sm">
                                    <input value="{{ old('tgl_lahir') }}" type="date" class="form-control" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>Jenis Kelamin</label>
                                </div>
                                <div class="col-sm">
                                    <select name="jenis_kelamin" class="form-control">
                                        <option {{ old('jenis_kelamin')==''?'selected':'' }} value=""></option>
                                        <option {{ old('jenis_kelamin')=='Laki-laki'?'selected':'' }} value="Laki-laki">Laki-laki</option>
                                        <option {{ old('jenis_kelamin')=='Perempuan'?'selected':'' }} value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>No HP WhatsApp</label>
                                </div>
                                <div class="col-sm">
                                    <input value="{{ old('no_hp') }}" type="number" class="form-control" name="no_hp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>Nama</label>
                                </div>
                                <div class="col-sm">
                                    <input value="{{ old('nama') }}" type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-sm">
                                    <input value="{{ old('alamat') }}" type="text" class="form-control" name="alamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>Kelurahan</label>
                                </div>
                                <div class="col-sm">
                                    <input value="{{ old('kelurahan') }}" type="text" class="form-control" name="kelurahan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>Kecamatan</label>
                                </div>
                                <div class="col-sm">
                                    <input value="{{ old('kecamatan') }}" type="text" class="form-control" name="kecamatan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2">
                                    <label>Keluarga besar TNI</label>
                                </div>
                                <div class="col-sm">
                                    <select name="keluarga_besar_tni" class="form-control">
                                        <option value=""></option>
                                        @foreach ($data as $item)
                                            <option {{ $item->nama==old('keluarga_besar_tni'?'selected':'') }} value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/bootstrap.bundle.min.js"></script>
</body>

</html>
