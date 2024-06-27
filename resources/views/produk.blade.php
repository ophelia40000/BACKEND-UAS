@extends('layout.mainLayout')

@section('title', 'Produk')

@section('content')
<div class="search__container">
    <form id="searchForm" action="{{ route('produk.search') }}" method="GET">
        <p class="search__title">
            Cari Barang Kesukaan Anda
        </p>
        <input class="search__input" type="text" name="query" id="searchInput" placeholder="Search">
    </form>
</div>

<div class="filter-buttons">
    <button class="btn btn-outline-dark filter-btn" data-filter="all">Semua Produk</button>
    <button class="btn btn-outline-dark filter-btn" data-filter="baju">Baju</button>
    <button class="btn btn-outline-dark filter-btn" data-filter="gaun">Gaun</button>
</div>


<section class="py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4" id="productContainer">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product->image }}" class="card-img-top" alt="Product Image" style="height: 350px; width:600">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                            <p class="card-text">Rp{{ number_format($product->price, 2, ',', '.') }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.show', ['productId' => $product->id]) }}" class="btn btn-outline-dark">View Products</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
</section>

@endsection
