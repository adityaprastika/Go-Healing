@extends('layouts.main')
@section('title')
Wisata
@endsection

@section('content')

<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Order</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Order</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-blue text-uppercase" style="letter-spacing: 5px;">Data Order</h6>
            <h1>Upload Bukti Pembayaran Anda</h1>
            <h2>No Rek : 1930849 (BNI GO HEALING)</h2>
            <h4>Setelah Melakukan Pembayaran </h4> <h4> Lanjut Ke Menu History Untuk Cetak Bukti Pembayaran</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="contact-form bg-white" style="padding: 30px;">
                    <div id="success"></div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tipe</th>
                                                        <th>Status</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Total</th>
                                                        <th>Deskripsi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-left">
                                                    @foreach ($data as $d )
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $d->tipe }}</td>
                                                        <td>{{ $d->status }}</td>
                                                        <td>{{ $d->jumlah }}
                                                            @if($d->wisata_id == !null)
                                                            Orang
                                                            @elseif($d->travel_id == !null)
                                                            Orang
                                                            @elseif($d->mobil_id == !null)
                                                            Hari
                                                            @endif
                                                        </td>
                                                        <td>{{ $d->harga }}
                                                            @if($d->wisata_id == !null)
                                                            /Orang
                                                            @elseif($d->travel_id == !null)
                                                            /Orang
                                                            @elseif($d->mobil_id == !null)
                                                            /Hari
                                                            @endif
                                                        </td>
                                                        <td>Rp. {{ $d->total }} </td>
                                                        <td>
                                                            @if($d->wisata_id == !null)
                                                            {{ $d->wisata->nama_wisata }}
                                                            @elseif($d->travel_id == !null)
                                                            {{ $d->travel->kota_asal }} -> {{ $d->travel->tujuan }}
                                                            @elseif($d->mobil_id == !null)
                                                            {{carbon\carbon::parse($d->tanggal)->translatedFormat('d F Y')}} - {{carbon\carbon::parse($d->tanggal_selesai)->translatedFormat('d F Y')}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-sm btn-info text-white" href="{{ route('customer.order.edit', $d->id) }}">
                                                                <i class="fas fa-upload"></i>
                                                              </a>
                                                            <button data-target="#modalcancel" data-toggle="modal" type="button"
                                                                class="delete btn btn-sm bg-danger"
                                                                data-link="{{ route('customer.order.destroy',$d->id) }}">
                                                                <i class="fas fa-times"></i>
                                                            </button>

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
                        </div>
    @include('layouts.cancel_modal')
    @section('script')
    <script>
        $('.delete').on('click', function(){
        var link = $(this).data('link');
        $('#formDelete').attr('action',link)
        });
    </script>
    @endsection

@endsection
