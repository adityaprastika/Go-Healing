@extends('layouts.appadmin')

@section('title')
Ubah Mobil
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mobil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Ubah Mobil</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3>Ubah</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.mobil.update', $mobil->id) }}">
                            <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="merk">Merk</label>
                                    <input type="text" class="form-control" id="merk" name="merk" value="{{ $mobil->merk }}"
                                        placeholder="Masukan Merk" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $mobil->jenis }}"
                                        placeholder="Masukan Jenis" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_plat">Nomor Plat</label>
                                    <input type="text" class="form-control" id="no_plat" name="no_plat" value="{{ $mobil->no_plat }}"
                                        placeholder="Masukan Nomor Plat" required>
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Tipe</label>
                                    <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $mobil->tipe }}"
                                        placeholder="Masukan Tipe" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Sewa</label>
                                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $mobil->harga }}"
                                        placeholder="Masukan Harga" required>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('admin.mobil.index') }}"
                                        class="btn btn btn-danger">Kembali</a>
                                </td>
                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection
