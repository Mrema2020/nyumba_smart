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
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        @include('sidebar')
        <div class="main-panel">
            @include('navbar')
            <div class="container, properties">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Property categories</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        <i class="bi bi-plus-circle me-1"></i> Add Property Category
                    </button>
                </div>

                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Property Category</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $counter = 0; ?>
                                @forelse($categories as $category)
                                        <?php $counter ++; ?>
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning editBtn"
                                            href="#"
                                            data-id="{{ $category->id }}"
                                            data-title="{{ $category->title }}"
                                            data-description="{{ $category->description }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal">
                                            Edit
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="{{url('delete_property_category', $category->id)}}" onclick=" return confirm('Are you sure you want to delete ths record?') ">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No records found.</td>
                                </tr>
                                @endforelse
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

            <!-- Edit Category Modal -->
            <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" action="{{ url('edit_property') }}">
                        @csrf
                        <input type="hidden" name="id" id="edit-id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="edit-title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="edit-title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="edit-description" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('scripts')
    <!-- Bootstrap Icons (optional for icons) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).on('click', '.editBtn', function() {
            let id = $(this).data('id');
            let title = $(this).data('title');
            let description = $(this).data('description');

            $('#edit-id').val(id);
            $('#edit-title').val(title);
            $('#edit-description').val(description);
        });
    </script>

</body>

</html>
