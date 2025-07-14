<div class="navbar-nav mx-auto">
    <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
    <a href="{{ route('satuan') }}" class="nav-item nav-link {{ request()->is('product/satuan') ? 'active' : '' }}">Satuan</a>
    <a href="{{ route('paket') }}" class="nav-item nav-link {{ request()->is('product/paket') ? 'active' : '' }}">Paket</a>
    <a href="{{ route('sekolah') }}" class="nav-item nav-link {{ request()->is('product/sekolah') ? 'active' : '' }}">Sekolah</a>
    {{-- NESTED MENU --}}
    {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.html" class="dropdown-item">Cart</a>
                                    <a href="chackout.html" class="dropdown-item">Chackout</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div> --}}
</div>
