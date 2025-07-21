@extends('frontend.layouts.landing')
@section('title')
    Perbaharui Nomor Anda
@endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Perbaharui Nomor Anda</h1>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('updatemobile') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nomor Handphone (Aktif)</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" name="mobile" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Simpan
                                    </button>
                                </div>
                            </div>
                            <small class="text-muted">*format 6281223455677</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection
