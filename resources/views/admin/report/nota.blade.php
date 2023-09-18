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







table {
    max-width: 100%;
    max-height: 100%;
}
body {
	padding: 5px;
	position: relative;
	width: 100%;
	height: 100%;
}
table th,
table td {
	padding: .625em;
    text-align: center;
}
table .kop:before {
	content: ': ';
}
.left {
	text-align: left;
}
table #caption {
    font-size: 1.5em;
    margin: .5em 0 .75em;
}
table.border {
    width: 100%;
    border-collapse: collapse
}

table.border tbody th, table.border tbody td {
    border: thin solid #000;
    padding: 2px
}
.ttd td, .ttd th {
	padding-bottom: 4em;
}

    </style>

</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="pemko" src="{{ asset('img/logo.png ')}}">
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
        <div id="printable" class="container">
            <table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
              <thead>
              <tr>
                <td colspan="2">Nama Pelanggan</td>
                <td class="left kop">{{ $data->user->name }}</td>
                <td></td>
                <td>Tanggal </td>
                <td class="left kop">
                    @if($data->mobil_id == !null)
                        {{carbon\carbon::parse($data->tanggal)->translatedFormat('d F Y')}} - {{carbon\carbon::parse($data->tanggal_selesai)->translatedFormat('d F Y')}}
                    @else
                        {{carbon\carbon::parse($data->tanggal)->translatedFormat('d F Y')}}
                    @endif
                </td>
              </tr>
              <tr>
                <td colspan="2">No Handphone</td>
                <td class="left kop">{{ $data->user->nohp }}</td>
                <td></td>
                <td>Layanan</td>
                <td class="left kop">{{ $data->tipe }}</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </thead>
              <tbody>
                <tr>
                  {{-- <th>No</th> --}}
                  <th>Harga Satuan</th>
                  <th>JUMLAH</th>
                  <th>TOTAL</th>
                  <th colspan="3">KETERANGAN</th>
                </tr>
                <tr>
                  {{-- <td align="right">{{ $data->jumlah }}</td> --}}
                  <td>Rp. {{number_format($data->harga, 0, ',', '.')}},-</td>
                  <td align="right">{{ $data->jumlah }}
                    @if($data->wisata_id == !null)
                    Orang
                    @elseif($data->travel_id == !null)
                    Orang
                    @elseif($data->mobil_id == !null)
                    Hari
                    @endif
                  </td>
                  <td>Rp. {{number_format($data->total, 0, ',', '.')}},-</td>
                  <td colspan="3">
                    @if($data->wisata_id == !null)
                    {{ $data->wisata->nama_wisata }}
                    @elseif($data->travel_id == !null)
                    {{ $data->travel->kota_asal }} -> {{ $data->travel->tujuan }}
                    @elseif($data->mobil_id == !null)
                    {{carbon\carbon::parse($data->tanggal)->translatedFormat('d F Y')}} - {{carbon\carbon::parse($data->tanggal_selesai)->translatedFormat('d F Y')}}
                    @endif
                  </td>
                </tr>
                <tr>
                  <th colspan="2"> TOTAL</th>
                  <td>Rp. {{number_format($data->total, 0, ',', '.')}},-</td>
                  <td colspan="3"></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="ttd">
                  <th colspan="3">Customer</th>

                  <th colspan="3">Mengetahui</th>
                </tr>
                <tr>
                  <td colspan="3">{{ $data->user->name }}</td>

                  <td colspan="3">..................</td>
                </tr>
              </tfoot>
            </table>
            <div class="text-right">
                <button id="btnPrint" class="btn btn-lg"
                    style="width: 100%; height:40px; background-color:rgb(170, 170, 255); color:white;"
                    onclick="PrintWindow()">Cetak</button>
                {{-- <input id="btnPrint" type="button" value="Print" onclick="PrintWindow()" /> --}}
            </div>
            </div>
    </div>
    <script type="text/javascript">
        function PrintWindow() {
            var btnPrint = document.getElementById("btnPrint");
            btnPrint.style.visibility = 'hidden';
            window.print()
            btnPrint.style.visibility = 'visible';
        }
    </script>
</body>

</html>
