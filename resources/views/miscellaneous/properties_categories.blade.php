<!DOCTYPE html>
<html lang="en">
<head>
    @include('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .properties {
            padding: 8rem 2rem;
            background-color: #f8f9fa;
        }
        .table-container {
            background: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
<div class="wrapper">
    @include('sidebar')
    <div class="main-panel">
        @include('navbar')
        <div class="container, properties">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="bi bi-plus-circle me-1"></i> Add Category
                </button>
            </div>

            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Property Type</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="categoryForm" method="POST" action="{{ url('add_category') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCategoryModalLabel">Add Property Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="categoryTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="categoryTitle" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="categoryDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="categoryDescription" rows="3" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap Icons (optional for icons) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @include('footer')
    </div>
</div>
@include('scripts')
</body>
</html>
