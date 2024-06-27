<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Edit Carousel</title>
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
            <h1>Carousel Management</h1>
        </header>
        <div class="content">
            <!-- Form for adding new carousel item -->
            <form action="{{ route('admin.carousel.store') }}" method="POST" class="add-carousel-form">
                @csrf
                <input type="text" name="title" placeholder="Title" required>
                <input type="text" name="image" placeholder="Image URL" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <button type="submit" class="add-btn">Add Carousel Item</button>
            </form>

            <!-- Table displaying all carousel items -->
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carouselItems as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td><img src="{{ $item->image }}" alt="{{ $item->title }}" style="width: 100px;"></td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <button class="edit-btn" onclick="openEditModal('{{ $item->id }}', '{{ $item->title }}', '{{ $item->image }}', '{{ $item->description }}')">Edit</button>
                                <button class="delete-btn" onclick="deleteCarouselItem('{{ $item->id }}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Carousel Item Modal -->
<div class="modal fade" id="editCarouselModal" tabindex="-1" role="dialog" aria-labelledby="editCarouselModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarouselModalLabel">Edit Carousel Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editCarouselForm">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="editCarouselId">
                    <input type="text" id="editTitle" name="title" placeholder="Title" required>
                    <input type="text" id="editImage" name="image" placeholder="Image URL" required>
                    <textarea id="editDescription" name="description" placeholder="Description" required></textarea>
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
<script>
    function openEditModal(id, title, image, description) {
        $('#editCarouselId').val(id);
        $('#editTitle').val(title);
        $('#editImage').val(image);
        $('#editDescription').val(description);
        $('#editCarouselModal').modal('show');
    }

    $(document).ready(function() {
        $('#editCarouselForm').on('submit', function(e) {
            e.preventDefault();
            const carouselId = $('#editCarouselId').val();
            const data = {
                title: $('#editTitle').val(),
                image: $('#editImage').val(),
                description: $('#editDescription').val(),
                _token: $('input[name="_token"]').val()
            };

            $.ajax({
                url: '/admin/carousel/edit/' + carouselId,
                type: 'POST',
                data: data,
                success: function(result) {
                    $('#editCarouselModal').modal('hide');
                    alert('Carousel item updated successfully');
                    window.location.reload();
                },
                error: function(err) {
                    alert('Error updating carousel item');
                }
            });
        });
    });

    function deleteCarouselItem(carouselId) {
        if (confirm('Are you sure you want to delete this carousel item?')) {
            $.ajax({
                url: '/admin/carousel/' + carouselId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    alert('Carousel item deleted successfully');
                    window.location.reload();
                },
                error: function(err) {
                    alert('Error deleting carousel item');
                }
            });
        }
    }
</script>
</body>
</html>
