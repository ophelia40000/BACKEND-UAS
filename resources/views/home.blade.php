@extends('layout.mainLayout')
@section ('title', 'Home')
@section('content')
        <div class="headerimg">
            <h1>Jelajahi gaya baru dalam berbelanja baju perempuan di toko kami, dengan koleksi gaun elegan dan baju tidur yang nyaman.</h1>
            <h3>Temukan pilihan terbaik kami mulai dari Rp 139.000!</h3>
            <a href="{{ route('produk') }}" class="btn">Explore Now &#8594;</a>
        </div>
        <div class="carousel">
        <div class="carousel-inner">
            @foreach($carousels as $key => $carousel)
            <div class="carousel-item">
                <img src="{{ $carousel->image }}" alt="{{ $carousel->title }}" class="carousel-image">
                <div class="carousel-caption">
                    <h1>{{ $carousel->title }}</h1>
                    <p>{{ $carousel->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="carousel-controls">
            <button id="prev">‹</button>
            <button id="next">›</button>
        </div>
        <div class="carousel-indicators">
            @foreach($carousels as $key => $carousel)
            <div data-index="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></div>
            @endforeach
        </div>
    </div>

    <div class="small-container">
    <h2>Hot Releases</h2>
    <div class="line1"></div>
    <div class="child">
        @foreach ($products as $product)
        <div class="childprods">
            <a href="./product_details.html"><img src="{{ asset($product->image) }}"></a>
            <h4>{{ $product->name }}</h4>
            <div class="rating">
                <!-- Tampilkan 5 bintang penuh untuk setiap produk -->
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <p>Rp{{ $product->price }}</p>
        </div>
        @endforeach
    </div>
</div>

</div>

            <h2>Latest Releases</h2>
            <div class="line1"></div>
            <div class="child">
                <!-- <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-5.webp"></a>
                    <h4>Adventure Hoodies</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>$63.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-6.webp"></a>
                    <h4>Red Unisex T-Shirt</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>$57.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-7.webp"></a>
                    <h4>Black Sweatpants for Women</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$45.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-8.webp"></a>
                    <h4>Black Unisex Jeans</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$59.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-9.webp"></a>
                    <h4>Blue Wardrobe Ties</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$15.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-10.webp"></a>
                    <h4>Black T-Shirts for Men</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$80.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-11.webp"></a>
                    <h4>Sweatpants for Men</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p>$60.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-12.webp"></a>
                    <h4>Socks</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$19.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-13.webp"></a>
                    <h4>Trekking Shoes</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p>$149.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-14.webp"></a>
                    <h4>Sports Wear</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p>$72.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-15.webp"></a>
                    <h4>Blue Hats</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p>$29.99</p>
                </div>
                <div class="childprods">
                    <a href="./product_details.html"><img src="./images/products/product-16.webp"></a>
                    <h4>Black Ties</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$19.99</p>
                </div> -->
            </div>
        </div>
        <div class="more">
            <a href="./products.html">See More</a>
        </div>
        <div class="offer">
            <div class="small-container">
                <div class="child">
                    <div class="halfchild">
                        <img src="{{ asset('images/image1.png') }}" class="offer-img">
                    </div>
                    <div class="halfchild">
                        <p>Exclusively avaliable here</p>
                        <h1>Gaun Merah Elegan</h1>
                        <small>
                            Gaun yang dirancang khusus untuk tampil anggun dan percaya diri. Tunjukkan pesona Anda dan melangkahlah
                            dengan gaya yang menawan.<br>
                        </small>
                        <a href="./product_details.html" class="btn">Buy Now &#8594;</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="testimonial">
            <div class="small-container">
                <h3><i class="fa fa-quote-left"></i> &emsp;See what our clients say about us -</h3>
                <div class="child">
                    <div class="testchild">
                        <p>Absolutely loved the fine hoodies I brought from this place. 11/10 would buy from here again.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="./images/testimonials/jemma.jpg">
                        <h3>Jemma Stone</h3>
                    </div>
                    <div class="testchild">
                        <p>Jesus Christ who put up this ugly website. Recommend firing that guy. Jk good site pls no remove comment.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <img src="./images/testimonials/rachel.jpg">
                        <h3>Rachel Myers</h3>
                    </div>
                    <div class="testchild">
                        <p>No wonder this site is so popular! It has the best prices in the city and really like the styles.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <img src="./images/testimonials/anne.jpg">
                        <h3>Anne Jordan</h3>
                    </div>
                </div>
            </div>
        </div> -->

        @endsection
       