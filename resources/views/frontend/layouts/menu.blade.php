<div class="navbar-nav mx-auto">
    <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
    <a href="shop.html" class="nav-item nav-link">Satuan</a>
    <a href="shop.html" class="nav-item nav-link">Paket</a>
    <a href="shop.html" class="nav-item nav-link">Sekolah</a>
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
