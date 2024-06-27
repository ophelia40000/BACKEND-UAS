<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'My App')</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" type="image/svg+xml" href="./images/header/favicon.svg">
        <link rel="stylesheet" href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </head>
    <body>
        <img src="./images/header/headerprod.jpg" style="display: none;">
        <div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="./index.html"><img src="{{ asset('images/image2.png') }}" alt="comp" width="225px"></a>
            </div>
            <nav>
                <ul class="nav-menu">
                    @auth
                        @if (auth()->user()->isAdmin())
                            <li class="nav-item"><a href="{{ route('admin.users') }}">Admin Dashboard</a></li>
                        @endif
                    @endauth
                    <li class="nav-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a href="{{ route('produk') }}">Products</a></li>
                    @guest <!-- Menampilkan saat tamu (pengguna belum login) -->
                        <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}">Register</a></li>
                    @endguest
                    @auth <!-- Menampilkan saat pengguna sudah login -->
                        @if (!auth()->user()->isAdmin())
                            <li class="nav-item"><a href="{{ route('profil') }}">Order</a></li>
                        @endif 
                        
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link">Logout</button>
                            </form>
                        </li>
                        @if (!auth()->user()->isAdmin())
                            <li class="nav-item"><a href="{{ route('cart') }}"><img class="cart" src="{{ asset('images/cart.svg') }}" alt="Cart"></a></li>
                        @endif 
                    @endauth
                </ul>
            </nav>
            <div class="toggle"><i class="fa fa-bars"></i></div>
        </div>
    </div>
</div>

        </div>

    @yield('content')


<div class="footer" id="footer">
            <div class="container">
                <div class="child">
                    <div class="footerChild1">
                    <img src="{{ asset('images/image2.png') }}" alt="Example Image">
                        <h4>Mail us at: <a href="mailto:graciafashion@gmail.com">graciafashion@gmail.com</a></h4>
                    </div>
                    <div class="footerChild2">
                        <h3>Help</h3>
                        <ul>
                            <li><a href="linkgoeshere">Payments</a></li>
                            <li><a href="linkgoeshere">Shipping</a></li>
                            <li><a href="linkgoeshere">Return Policy</a></li>
                            <li><a href="linkgoeshere">FAQ Topics</a></li>
                        </ul>
                    </div>
                    <div class="footerChild2">
                        <h3>Our Socials</h3>
                        <ul>
                            <li><a href="linkgoeshere">Instagram</a></li>
                            <li><a href="linkgoeshere">Facebook</a></li>
                            <li><a href="linkgoeshere">Twitter</a></li>
                            <li><a href="linkgoeshere">Linkedin</a></li>
                        </ul>
                    </div>
                    <div class="footerChild2">
                        <h3>Registered Office</h3>
                        <ul>
                            <li> Metro Atom Plaza Lt 3</li>
                            <li>Jl. Ps. Baru No.14, RT.15/RW.4</li>
                            <li>Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta</li>
                            <li>-</li>
                        </ul>
                    </div>
                </div>
                <div class="belowfooter">
                    &copy; Gracia Fashion <br>

                </div>
            </div>
        </div>
        @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first() }}',
            customClass: {
                popup: 'swal-popup-custom',
                title: 'swal-title-custom', // Kustom class untuk gaya popup// Kustom class untuk gaya konten
            },
        });
    </script>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Script untuk menampilkan alert pop-up jika ada pesan sukses dari session
    $(document).ready(function() {
        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get('success') }}',
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                    content: 'swal-content-custom'
                }
            });
        @endif
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const products = document.querySelectorAll('#productContainer .col');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filterValue = this.dataset.filter.toLowerCase();
                products.forEach(product => {
                    const productName = product.querySelector('.card-title').textContent.toLowerCase();
                    if (filterValue === 'all' || productName.includes(filterValue)) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });
        });
        
    });
</script>

<script>
    // Script untuk menampilkan alert pop-up jika ada pesan sukses dari session
    $(document).ready(function() {
        @if(Session::has('admin'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!!!',
                text: '{{ Session::get('admin') }}',
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                    content: 'swal-content-custom'
                }
            });
        @endif
    });
</script>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const carouselInner = document.querySelector('.carousel-inner');
            const items = document.querySelectorAll('.carousel-item');
            const indicators = document.querySelectorAll('.carousel-indicators div');
            let currentIndex = 0;
            const totalItems = items.length;

            function updateCarousel() {
                carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentIndex);
                });
            }

            function showNextItem() {
                currentIndex = (currentIndex + 1) % totalItems;
                updateCarousel();
            }

            function showPrevItem() {
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                updateCarousel();
            }

            document.getElementById('next').addEventListener('click', showNextItem);
            document.getElementById('prev').addEventListener('click', showPrevItem);
            indicators.forEach(indicator => {
                indicator.addEventListener('click', () => {
                    currentIndex = parseInt(indicator.dataset.index);
                    updateCarousel();
                });
            });

            setInterval(showNextItem, 5000); // Change item every 5 seconds

            updateCarousel();
        });
    </script>
    </body>
</html>