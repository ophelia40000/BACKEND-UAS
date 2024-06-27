@extends('layout.mainLayout')

@section('title', 'Produk')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 style="margin-top: 30px">Orders List</h2>
                <div class="d-flex justify-content-end mb-3">
    <div class="form-inline">
        <form method="GET" action="{{ route('profil') }}">
            <select class="form-control" id="order-sort" name="sort">
                <option value="price-asc" @if(request('sort') == 'price-asc') selected @endif>Price Ascending</option>
                <option value="price-desc" @if(request('sort') == 'price-desc') selected @endif>Price Descending</option>
            </select>
            <button type="submit" class="btn btn-primary" style="margin-left: 10px">Sort</button>
        </form>
    </div>
</div>
                

                <div class="table-responsive" style="margin-bottom: 300px">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td style="background-color:grey">{{ $order->product_name }}</td>
                                    <td style="background-color:grey">{{ $order->product_size }}</td>
                                    <td style="background-color:grey">{{ $order->product_quantity }}</td>
                                    <td class="order-status @if($order->status === 'approved') green @elseif($order->status === 'pending') grey @elseif($order->status === 'rejected') red @endif">
                                        {{ $order->status }}
                                    </td>
                                    <td style="background-color:grey">Rp. {{ $order->total_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection