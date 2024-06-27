<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<div class="dashboard">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('admin.orders') }}">Order</a></li>
                <li><a href="{{ route('admin.users') }}">Produk</a></li>
                <li><a href="{{ route('admin.produk') }}">Users</a></li>
                <li><a href="{{ route('admin.carousel') }}">Carousel</a></li>
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
                <h1>Products Management</h1>
            </header>
            <div class="content">
                <!-- Form for adding new products -->
                <form action="{{ route('admin.products.store') }}" method="POST" class="add-product-form">
                    @csrf
                    <input type="text" name="name" placeholder="Product Name" required>
                    <input type="text" name="image" placeholder="Image URL" required>
                    <input type="text" name="quantity" placeholder="Quantity" required>
                    <input type="text" name="price" placeholder="Price" required>
                    <input type="text" name="stripeId" placeholder="Stripe ID" required>
                    <button type="submit" class="add-btn">Add Product</button>
                </form>

                <!-- Table displaying all products -->
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Stripe ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 100px;"></td>
                                <td>{{ $product->quantity }}</td>
                                <td>Rp.{{ $product->price }}</td>
                                <td>{{ $product->stripeId }}</td>
                                <td>
                                    <button class="edit-btn" onclick="openEditModal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->image }}','{{ $product->quantity }}', '{{ $product->price }}', '{{ $product->stripeId }}')">Edit</button>
                                    <button class="delete-btn" onclick="deleteProduct('{{ $product->id }}')">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="editProductId">
                        <input type="text" id="editName" name="name" placeholder="Product Name" required>
                        <input type="text" id="editImage" name="image" placeholder="Image URL" required>
                        <input type="text" id="editQuantity" name="quantity" placeholder="Quantity" required>
                        <input type="text" id="editPrice" name="price" placeholder="Price" required>
                        <input type="text" id="editStripeId" name="stripeId" placeholder="Stripe ID" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script>
        function openEditModal(id, name, image,quantity, price, stripeId) {
            $('#editProductId').val(id);
            $('#editName').val(name);
            $('#editImage').val(image);
            $('#editQuantity').val(quantity);
            $('#editPrice').val(price);
            $('#editStripeId').val(stripeId);
            $('#editProductModal').modal('show');
        }

        $(document).ready(function() {
            $('#editForm').on('submit', function(e) {
                e.preventDefault();
                const productId = $('#editProductId').val();
                const data = {
                    name: $('#editName').val(),
                    image: $('#editImage').val(),
                    quantity: $('#editQuantity').val(),
                    price: $('#editPrice').val(),
                    stripeId: $('#editStripeId').val(),
                    _token: $('input[name="_token"]').val()
                };

                $.ajax({
                    url: '/admin/products/edit/' + productId,
                    type: 'POST',
                    data: data,
                    success: function(result) {
                        $('#editProductModal').modal('hide');
                        alert('Product updated successfully');
                        window.location.reload();
                    },
                    error: function(err) {
                        alert('Error updating product');
                    }
                });
            });
        });

        function deleteProduct(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                $.ajax({
                    url: '/admin/products/' + productId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        alert('Product deleted successfully');
                        window.location.reload();
                    },
                    error: function(err) {
                        alert('Error deleting product');
                    }
                });
            }
        }
    </script>
</body>
</html>
