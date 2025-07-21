<!-- Footer Start -->
<div class="container-fluid bg-blue text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-9">
                    <a href="#">
                        <h1 class="text-primary mb-0">{{ env('APP_NAME') }}</h1>
                        <p class="text-secondary mb-0">{{ env('APP_URL') }}</p>
                    </a>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle"
                            href="{{ $config->instagram }}"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                            href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                            href="{{ $config->youtube }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Mengapa harus memilih kami!</h4>
                    <p class="mb-4">{{ $config->why }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Info {{ env('APP_NAME') }}</h4>
                    <a class="btn-link" href="">Tentang Kami</a>
                    <a class="btn-link" href="">Kontak Kami</a>
                    <a class="btn-link" href="">Kebijakan privasi</a>
                    <a class="btn-link" href="">Syarat dan Ketentuan</a>
                    <a class="btn-link" href="">Kebijakan Pengembalian</a>
                    <a class="btn-link" href="">FAQs dan Bantuan</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Akun</h4>
                    @guest
                        <a class="btn-link" href="">Login</a>
                    @endguest

                    @auth
                        @cannot('users_manage')
                            <a class="btn-link" href="">Pesanan Saya</a>
                        @endcannot
                        <a class="btn-link" href="#"
                            onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a>
                    @endauth
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Kontak</h4>
                    <p>Alamat: {{ $config->address }}</p>
                    <p>Email: {{ $config->email }}</p>
                    <p>Handphone: {{ $config->mobile }}</p>
                    <p class="fw-bold">Jenis Pembayaran</p>
                    <img src="{{ asset('landing/img/payment.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
