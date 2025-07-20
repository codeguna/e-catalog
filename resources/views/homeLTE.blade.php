@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Rekapitulasi Tahun {{ date('Y') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $incomingOrder }}</h3>
                                        <p>Pesanan Masuk</p>
                                    </div>
                                    <div class="icon">
                                       <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>{{ $processOrder }}</h3>
                                        <p>Pesanan Diproses</p>
                                    </div>
                                    <div class="icon">
                                       <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5>Pendapatan</h5>                                
                            </div>
                            <div class="col-md-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>Rp. {{ number_format($revenueOrder) }},-</h3>
                                        <p>Pendapatan Masuk</p>
                                    </div>
                                    <div class="icon">
                                      <i class="fas fa-dollar-sign    "></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3>Rp. {{ number_format($revenueHold) }},-</h3>
                                        <p>Pendapatan Tertunda</p>
                                    </div>
                                    <div class="icon">
                                      <i class="fas fa-dollar-sign    "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
    @parent
@endsection
