<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        console.log('SweetAlert2 loaded');
    </script>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('admin.orders') }}">Order</a></li>
                <li><a href="{{ route('admin.users') }}">Users</a></li>
                <li><a href="{{ route('admin.produk') }}">Products</a></li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1>Orders Management</h1>
            </header>
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->product_quantity }}</td>
                                <td>{{ $order->product_size }}</td>
                                <td>{{ $order->status }}</td>
                                <td>Rp{{ number_format($order->total_price, 2, ',', '.') }}</td>
                                <td class="action-buttons">
                                    @if ($order->status === 'pending')
                                        <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>
                                        <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SweetAlert -->
    @if ($errors->any())
        <script>
            console.log('Errors: ', {!! json_encode($errors->all()) !!});
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                },
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            console.log('Success: ', '{{ session('success') }}');
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                },
            });
        </script>
    @endif
</body>
</html>