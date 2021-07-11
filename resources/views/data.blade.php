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
    <link href="{{ asset('pdf.css') }}" rel="stylesheet">
</head>

<body style="background-color: #dfebfd">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-primary">
                <div class="col">
                    <div class="header">
                        <h1>NO DAFTAR ONLINE</h1>
                        <h1>RUMKITBAN/RS DKT MOJOKERTO</h1>
                    </div>
                    <hr>
                    <div class="flex">
                        <div>
                            <table>
                                <tr>
                                    <td class="td">Nomor</td>
                                    <td>:</td>
                                    <td>{{ $pasien->no }}</td>
                                </tr>
                                <tr>
                                    <td class="td">Nama</td>
                                    <td>:</td>
                                    <td>{{ $pasien->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="td">NIK</td>
                                    <td>:</td>
                                    <td>{{ $pasien->nik }}</td>
                                </tr>
                            </table>
                            <a href="{{ route('download',['pasien'=>$pasien->id]) }}" class="btn btn-success"> Download PDF</a>
                        </div>
                        <div class="qrs ml-5" style="margin-left: 100px"> 
                            <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($pasien->kode, 'QRCODE') }}" alt="barcode"   />
                        </div>
                    </div>
                    <div class="alert alert-info mt-5 text-center">
                        <strong>Harap download PDF</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/bootstrap.bundle.min.js"></script>
</body>

</html>
