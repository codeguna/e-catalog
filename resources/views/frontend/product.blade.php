@extends('frontend.layouts.landing')
@section('title')
    Produk - {{ $name }}
@endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Produk | {{ $name }}</h1>
    </div>
    <!-- Single Page Header End -->


    <!-- Produk Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="col-lg-12">
                <div class="row g-4">
                    @foreach ($product as $items)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="rounded position-relative fruite-item">
                                <div class="fruite-img">
                                    <img src="/product_pictures/{{ $items->picture }}" class="img-fluid w-100 rounded-top"
                                        alt="">
                                </div>
                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                    style="top: 10px; left: 10px;">
                                    @if ($items->type == 1)
                                        Satuan
                                    @elseif ($items->type == 2)
                                        Paket
                                    @elseif ($items->type == 3)
                                        Sekolah
                                    @endif
                                </div>
                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                    <h4>{{ $items->name }}</h4>
                                    <p>{{ $items->description }}</p>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold mb-0">Rp. {{ number_format($items->price) }},-</p>
                                        <a href="{{ route('addcart', $items->id) }}"
                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add
                                            to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection
