    @extends('layout.mainLayout')

    @section('title', 'Product Detail')

    @section('content')
    <div class="small-container single-product">
        <div class="child">
            <div class="halfchild">
                <img src="{{ $product->image }}" width="550px" height="500px" id="prodImg"><br><br><br>
            </div>
            <div class="halfchild">
                <p>Home / Products</p>
                <h1>{{ $product->name }}</h1>
                <h4>Rp. {{ number_format($product->price, 2, ',', '.') }}</h4>
                <h5>Quantity : {{ $product->quantity }}</h5>
                <form id="addToCartForm" action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
                    @csrf
                    <select name="size" class="form-control mb-2">
                        <option disabled selected>Select Size</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->quantity }}" class="form-control mb-2">
                    <button type="submit" class="btn">Add To Cart</button>
                </form>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p>{{ $product->description }}</p>
            </div>
        </div>
    </div>
    <div class="small-container">
        <div class="child child-2">
            <h2>Related Products</h2>
            <p><a href="{{ route('produk') }}">View More</a></p>
        </div>
    </div>
    <div class="small-container">
    <div class="child">
        @foreach ($relatedProducts as $product)
        <div class="footerChild2">
            <img src="{{ $product->image }}" alt="{{ $product->name }} " style="height: 350px; width:600">
            <h4>{{ $product->name }}</h4>
            <div class="rating">
                @for ($i = 0; $i < 5; $i++)
                    <i class="fa fa-star"></i>
                @endfor
            </div>
            <p>Rp.{{ number_format($product->price, 2) }}</p>
        </div>
        @endforeach
    </div>
</div>

    </div>
    @endsection
