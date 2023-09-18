<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h4,
        h2 {
            font-family: serif;
        }

        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
        }

        br {
            margin-bottom: 5px !important;
        }

        .judul {
            text-align: center;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 110px;
            padding: 0px;
        }

        .pemko {
            width: 80px;
        }

        .logo {
            float: left;
            margin-right: 0px;
            width: 18%;
            padding: 0px;
            text-align: right;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 72%;
            padding-left: 0px;
            padding-right: 10%;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
            width: 100%;
        }

        .ttd {
            margin-left: 65%;
            text-align: center;
            text-transform: uppercase;
        }

        .text-right {
            text-align: right;
        }

        .isi {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="pemko" src="img/logoreport.png">
        </div>
        <div class="headtext">
           <h3 style="margin:0px;">GoHealing </h3>
            <h3 style="margin:0px;">Travel</h3>
            <p style="margin:0px;">Jalan Jauh Banget
            <p style="margin:0px;">Telp. 0823 2345 2793
            </p>
        </div>
        <br>
    </div>
    <div class="container">
        <hr style="margin-top:1px;">
        <div class="isi">
            <h2 style="text-align:center;">LAPORAN PENDAPATAN</h2>
            <h3 style="text-align:center;">{{Carbon\carbon::parse($start)->translatedFormat('d-F-Y')}} s/d
                {{Carbon\carbon::parse($end)->translatedFormat('d-F-Y')}}</h3>
            <br>
            <table id="myTable" class="table table-bordered table-striped dataTable no-footer text-center" role="grid"
                aria-describedby="myTable_info">
                <thead>

                    <tr>
                        <th>No</th>
                        {{-- <th>Pelanggan</th> --}}
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)

                    <tr>
                        <td style="text-align: left">{{$loop->iteration}}</td>
                        {{-- <td style="text-align: left">{{ $d->user->name }}</td> --}}
                        <td style="text-align: left">{{ $d->tipe }}</td>
                        <td style="text-align: left">@if($d->mobil_id == !null)
                            {{carbon\carbon::parse($d->tanggal)->translatedFormat('d F Y')}} - {{carbon\carbon::parse($d->tanggal_selesai)->translatedFormat('d F Y')}}
                            @else
                            {{carbon\carbon::parse($d->tanggal)->translatedFormat('d F Y')}}
                            @endif
                        </td>
                        <td style="text-align: left">{{ $d->jumlah }}
                            @if($d->wisata_id == !null)
                            Orang
                            @elseif($d->travel_id == !null)
                            Orang
                            @elseif($d->mobil_id == !null)
                            Hari
                            @endif
                        </td>
                        <td style="text-align: left">Rp. {{number_format($d->harga, 0, ',', '.')}},-
                            @if($d->wisata_id == !null)
                            /Orang
                            @elseif($d->travel_id == !null)
                            /Orang
                            @elseif($d->mobil_id == !null)
                            /Hari
                            @endif
                        </td>
                        <td style="text-align: left">
                            @if($d->wisata_id == !null)
                            {{ $d->wisata->nama_wisata }}
                            @elseif($d->travel_id == !null)
                            {{ $d->travel->kota_asal }} -> {{ $d->travel->tujuan }}
                            @elseif($d->mobil_id == !null)
                            {{carbon\carbon::parse($d->tanggal)->translatedFormat('d F Y')}} - {{carbon\carbon::parse($d->tanggal_selesai)->translatedFormat('d F Y')}}
                            @endif
                        </td>
                        <td style="text-align: left">Rp. {{number_format($d->total, 0, ',', '.')}},-</td>


                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6"><b>TOTAL KESELURUHAN</b></td>
                        <td colspan="1"><b>Rp. {{number_format($data->sum('total'), 0, ',', '.')}},-</b></td>
                     </tr>
                </tbody>
            </table>
            <br>
            <br>
            <div class="ttd">
                <p style="margin:0px"> Denpasar, {{$now}}</p>
                <h6 style="margin:0px">Tour Travel</h6>
                <br>
                <br>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px">Go Healing</h5>
                {{-- <h5 style="margin:0px">NIP. 19710830 199101 1 002</h5> --}}
            </div>
        </div>
    </div>
</body>

</html>
