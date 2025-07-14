@extends('layouts.dashboard')

@section('title')
    Pesanan Masuk
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fa fa-arrow-down" aria-hidden="true"></i> Pesanan Masuk
                            </span>

                            <div class="float-right">
                                <a href="#" data-toggle="modal" data-target="#createProduct"
                                    class="btn btn-success btn-sm float-right" data-placement="left">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="example1">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nama Pemesan</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Detail Belanja</th>
                                        <th>Total Belanja</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @forelse ($orders as $order)
                                       <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>
                                            @foreach ($order->orderItems as $item)
                                                <ol>
                                                    <li>{{ $item->product->name }} | Rp. {{ number_format($item->product->price) }}</li>
                                                </ol>
                                            @endforeach
                                        </td>
                                        <td>Rp. {{ number_format($order->total_amount) }},-</td>
                                        <td></td>
                                       </tr>
                                   @empty
                                       <tr>
                                        <td align="center" colspan="5">
                                            <span class="badge bg-warning">== Daftar Pesanan Kosong==</span>
                                        </td>
                                       </tr>
                                   @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
@endsection
