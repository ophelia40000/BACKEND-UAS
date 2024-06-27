@extends('layout.mainLayout')

@section('title', 'Keranjang Belanja')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Keranjang Belanja</h2>
        @if ($cartItems->isEmpty())
            <p>Keranjang Anda kosong.</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @foreach ($cartItems as $item)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $item->product->image }}" class="card-img-top" alt="Product Image" style="height: 350px; width:600">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $item->product->name }}</h5>
                                <p class="card-text">Rp{{ number_format($item->product->price, 2, ',', '.') }}</p>
                                <p class="card-text">Quantity: {{ $item->quantity }}</p>
                                <p class="card-text">Size: {{ $item->size }}</p>
                            </div>
                            <div class="card-footer2">
                                <form action="{{ route('cart.remove', ['cart' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-dark">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="box">
            <div class="cart-container">
                <h1>Keranjang Anda,</h1>
                <div class="cart-total">
                    <h4>Total Harga: Rp{{ number_format($totalPrice, 2, ',', '.') }}</h4>
                    <form action="{{ route('payments.payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="items" value="{{ json_encode($cartItems) }}">
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
