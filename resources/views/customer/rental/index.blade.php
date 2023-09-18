@extends('layouts.main')
@section('title')
Travel
@endsection

@section('content')
    <!-- Registration Start -->
     <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h2 class="text-blue text-uppercase" style="letter-spacing: 5px;">Daftar Mobil</h2>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center text-white">
                            <tr>
                                <th>No</th>
                                <th>Merk</th>
                                <th>Harga Sewa/Hari</th>
                            </tr>
                        </thead>
                        <tbody class="text-left text-white">
                            @foreach ($data as $d )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->merk }}, {{ $d->jenis }}, {{ $d->tipe }}</td>
                                <td>Rp.{{ $d->harga }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-blue text-center p-4">
                            <h1 class="text-white m-0">Order Sekarang</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form action="{{ route('rentalstore') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="date" name="tanggal" class="form-control p-4" placeholder="Tanggal Rental" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="number" name="jumlah" class="form-control p-4" placeholder="Lama Rental (hari)" required="required" />
                                </div>
                                <div class="form-group">
                                    <select name="mobil_id" class="custom-select px-4" style="height: 47px;" required>
                                        <option selected>Silahkan Mobil</option>
                                        @foreach ($data as $d)
                                        <option value="{{ $d->id }}">{{ $d->merk }},{{ $d->jenis }}, {{ $d->tipe }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-blue btn-block py-3" type="submit">Order Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
