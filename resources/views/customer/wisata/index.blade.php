@extends('layouts.main')
@section('title')
Wisata
@endsection

@section('content')

<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Paket Wisata</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Paket Wisata</p>
            </div>
        </div>
    </div>
</div>


    <!-- Booking Start -->
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <form action="{{ route('wisatastore') }}" method="post">
                @csrf
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <select name="wisata_id" class="custom-select px-4" style="height: 47px;" required>
                                        <option selected>Paket Wisata</option>
                                        @foreach ($data as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_wisata }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="date" name="tanggal" class="form-control p-4 datetimepicker-input" required placeholder="Tanggal" data-target="#date1" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <div class="text">
                                        <input type="number" name="jumlah" class="form-control p-4 " placeholder="Jumlah Orang"  r>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-blue btn-block" type="submit" style="height: 47px; margin-top: -2px;">Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <!-- Booking End -->

    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-blue text-uppercase" style="letter-spacing: 5px;">Paket Wisata</h6>
                <h1>List Paket Wisata</h1>
            </div>
            <div class="row">
                @foreach ($data as $d)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img style="height: 200px; width: 350px;" class="img-fluid" src="{{ asset('public/wisata/'.$d->foto) }}">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-blue mr-2"></i>{{ $d->lokasi }}</small>
                                <small class="m-0"><i class="fa fa-compass text-blue mr-2"></i>{{ $d->nama_wisata }}</small>
                                {{-- <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small> --}}
                            </div>
                            <a class="h5 text-decoration-none" href="{{ route('wisatashow', $d->id) }}">Lihat detail</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    {{-- <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6> --}}
                                    <h5 class="m-0">Rp. {{ $d->harga }}/orang</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
