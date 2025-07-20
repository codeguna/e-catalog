@extends('frontend.layouts.landing')
@section('title')
    Belanja Saya
@endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Belanja Saya</h1>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-primary">
                            Hi, {{ Auth::user()->name }}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Tanggal Belanja</th>
                                            <th scope="col">Total Belanja</th>
                                            <th scope="col">Detail Belanja</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $order->order_date }}</td>
                                                <td>Rp. {{ number_format($order->total_amount) }},-</td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-primary" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#content{{ $order->id }}"
                                                            aria-expanded="false" aria-controls="content{{ $order->id }}">
                                                          <i class="fa fa-shopping-bag" aria-hidden="true"></i>  Detail
                                                        </button>
                                                    </p>
                                                    <div class="collapse" id="content{{ $order->id }}">
                                                          @foreach ($order->orderItems as $item)
                                                    <ol>
                                                        <li>{{ $item->product->name }} | Rp.
                                                            {{ number_format($item->product->price) }}</li>
                                                    </ol>
                                                @endforeach
                                                    </div>

                                                </td>
                                                <td>
                                                    @if ($order->status == 0)
                                                        <span class="badge bg-warning text-dark w-100">
                                                            <i class="fa fa-info-circle" aria-hidden="true"></i> Menunggu
                                                            Proses
                                                        </span>
                                                    @elseif ($order->status == 1)
                                                        <span class="badge bg-success text-light w-100">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i> Sudah
                                                            Proses
                                                        </span>
                                                    @endif
                                                </td>                                                
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection
