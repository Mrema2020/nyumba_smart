<!DOCTYPE html>
<html lang="en">

<head>
    @include('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>

<body>
<div class="wrapper">
    @include('sidebar')
    <div class="main-panel">
        @include('navbar')
        <div class="container">
            <div class="container mt-5">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">List of Regions</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRegionModal">+ Add
                        Region
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>SN</th>
                            <th>Region Name</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $counter = 0;
                        ?>
                        @forelse($regions as $region)
                            <?php
                                $counter ++;
                            ?>
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $region-> name }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning editBtn"
                                       href="#"
                                       data-id="{{ $region->id }}"
                                       data-name="{{ $region->name }}"
                                       data-bs-toggle="modal"
                                       data-bs-target="#editRegionModal"
                                    >Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('delete_region', $region->id) }}"
                                       onclick=" return confirm('Are you sure you want to delete {{ $region->name }}') ">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No records found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('footer')
    </div>
</div>

{{--      Add region modal--}}
<div class="modal fade" id="addRegionModal" tabindex="-1" aria-labelledby="addRegionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="regionForm" method="POST" action="{{ url('add_region') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addRegionModalLabel">Add Property Region</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="regionTitle" class="form-label">Region Name:</label>
                        <input type="text" class="form-control" id="regionTitle" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add Region</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Region Modal -->
<div class="modal fade" id="editRegionModal" tabindex="-1" aria-labelledby="editRegionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ url('edit_region') }}">
            @csrf
            <input type="hidden" name="id" id="edit-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRegionModalLabel">Edit Region</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@include('scripts')
<script>
    $(document).on('click', '.editBtn', function () {
        let id = $(this).data('id');
        let name = $(this).data('name');
        $('#edit-id').val(id);
        $('#edit-name').val(name);
    });
</script>
</body>

</html>
