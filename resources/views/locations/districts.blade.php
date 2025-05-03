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
                    <h4 class="mb-0">List of Districts</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRegionModal">+ Add
                        District
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>SN</th>
                            <th>District</th>
                            <th>Region</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $counter = 0;
                        ?>
                        @forelse($districts as $district)
                                <?php
                                $counter ++;
                                ?>
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $district-> name }}</td>
                                <td>{{ $district-> region }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning editBtn"
                                       href="#"
                                       data-id="{{ $district->id }}"
                                       data-name="{{ $district->name }}"
                                       data-region="{{ $district->region }}"
                                       data-bs-toggle="modal"
                                       data-bs-target="#editRegionModal"
                                    >Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('delete_district', $district->id) }}"
                                       onclick=" return confirm('Are you sure you want to delete {{ $district->name }}') ">Delete</a>
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

        @include('footer')
    </div>
</div>

{{--      Add region modal--}}
<div class="modal fade" id="addRegionModal" tabindex="-1" aria-labelledby="addRegionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="regionForm" method="POST" action="{{ url('add_district') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addRegionModalLabel">Add Property Region</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="regionTitle" class="form-label">District Name:</label>
                        <input type="text" class="form-control" id="regionTitle" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="category">Region</label>
                        <select class="form-control" name="region" style="margin-top: 0.5rem;" required>

                            <option value="" selected="">Select region</option>

                            @foreach($regions as $region)
                                <option value="{{$region -> name}}"> {{$region -> name}} </option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add District</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Region Modal -->
<div class="modal fade" id="editRegionModal" tabindex="-1" aria-labelledby="editRegionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ url('edit_district') }}">
            @csrf
            <input type="hidden" name="id" id="edit-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRegionModalLabel">Edit District</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">District Name:</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="category">Region</label>
                        <select class="form-control" id="edit-region" name="region" style="margin-top: 0.5rem;" required>

                            <option value="" selected="">Select region</option>

                            @foreach($regions as $region)
                                <option value="{{$region -> name}}"> {{$region -> name}} </option>
                            @endforeach

                        </select>
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
        let region = $(this).data('region');
        $('#edit-id').val(id);
        $('#edit-name').val(name);
        $('#edit-region').val(region);
    });
</script>
</body>

</html>
