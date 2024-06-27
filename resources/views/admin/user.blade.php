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
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1>Users Management</h1>
            </header>
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Tanggal Buat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ date('M d, Y H:i', strtotime($user->created_at)) }}</td>
                                <td>
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">Delete</button>
                                    </form>
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
