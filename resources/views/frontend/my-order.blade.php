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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tanggal Belanja</th>
                            <th scope="col">Total Belanja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>Rp. {{ number_format ($order->total_amount) }},-</td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection
