@extends('layouts.appadmin')

@section('title')
Order
@endsection

@section('head')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
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
                        <td>
                            {{-- <a class="btn  btn-primary" href="{{ route('admin.travel.create') }}">
                                <span><i class="feather icon-plus"></i> Tambah Data Travel</span>
                            </a> --}}
                            <a type="button" href="{{ route('admin.report.orderall') }}" style="margin-left: 5px;" class="btn btn-sm btn-primary float-right" target="_blank">Cetak Order
                            </a>
                            <a type="button" href="{{ route('admin.report.orderwisata') }}" style="margin-left: 5px;" class="btn btn-sm btn-primary float-right" target="_blank">Cetak Wisata
                            </a>
                            <a type="button" href="{{ route('admin.report.orderrental') }}" style="margin-left: 5px;" class="btn btn-sm btn-primary float-right" target="_blank">Cetak Rental
                            </a>
                        </td>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Pelanggan</th>
                                    <th>Tipe</th>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-left">
                                @foreach ($data as $d )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->user->name }}</td>
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
                                    <td>Rp. {{number_format($d->harga, 0, ',', '.')}},-
                                        @if($d->wisata_id == !null)
                                        /Orang
                                        @elseif($d->travel_id == !null)
                                        /Orang
                                        @elseif($d->mobil_id == !null)
                                        /Hari
                                        @endif
                                    </td>
                                    <td>Rp. {{number_format($d->total, 0, ',', '.')}},- </td>
                                    <td>
                                        @if ($d->foto == null)
                                            Belum Ada Bukti
                                        @elseif($d->foto)
                                            <a class="btn btn-info" href="{{ asset('public/order/'.$d->foto) }}" target="_blank">Lihat Bukti</a>
                                        @endif
                                    </td>
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
                                        <a class="btn btn-sm btn-info text-white" href="{{ route('admin.order.edit', $d->id) }}">
                                            <i class="fas fa-edit"></i>
                                          </a>
                                        <button data-target="#modaldelete" data-toggle="modal" type="button"
                                            class="delete btn btn-sm bg-danger"
                                            data-link="{{ route('admin.order.destroy',$d->id) }}">
                                            <i class="fas fa-times"></i>
                                        </button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
@include('layouts.delete_modal')
@endsection

@section('script')

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

<script>
    $('.delete').on('click', function(){
    var link = $(this).data('link');
    $('#formDelete').attr('action',link)
    });
</script>
@endsection
