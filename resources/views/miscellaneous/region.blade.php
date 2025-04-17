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
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">List of Regions</h4>
                        <button class="btn btn-success">+ Add Region</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Region Name</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($regions as $region)
                                <tr>
                                    <td>{{$region -> id}}</td>
                                    <td>{{ $region-> name }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary me-1">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @include('scripts')
</body>

</html>