<!DOCTYPE html>
<html lang="en">

<head>
    @include('css')
    <style>
        .table-wrapper {
            overflow-x: auto;
        }

        .properties {
            padding: 6rem 2rem;
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
                    <h3>All Properties</h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPropertyModal">+ Add Property</button>
                </div>

                <div class="table-responsive table-wrapper">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($properties as $property)
                            <tr style="cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#viewPropertyModal"
                                data-title="{{ $property->title }}"
                                data-description="{{ $property->description }}"
                                data-price="{{ $property->price }}"
                                data-category="{{ $property->category }}"
                                data-type="{{ $property->type }}"
                                data-status="{{ $property->status }}"
                                data-location="{{ $property->region }} {{ $property->district }} {{ $property->ward }}"
                                data-image="{{ asset('properties/' . $property->image) }}" {{-- Assuming image_path is stored --}}>
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->description }}</td>
                                <td>{{ $property->price }}</td>
                                <td>{{ $property->category }}</td>
                                <td>{{ $property->type }}</td>
                                <td>{{ $property->status }}</td>
                                <td>{{ $property->region }} {{ $property->district }} {{ $property->ward }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No records found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPropertyModal" tabindex="-1" aria-labelledby="addPropertyModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="propertyForm" method="POST" action="{{ url('add_property') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPropertyModal">Add Property</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="categoryTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="categoryPrice" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" style="margin-top: 0.5rem;" required>

                                <option value="" selected="">Select category</option>

                                @foreach($categories as $item)
                                <option value="{{$item -> title}}"> {{$item -> title}} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category">Poperty type</label>
                            <select class="form-control" name="type" style="margin-top: 0.5rem;" required>

                                <option value="" selected="">Select property type</option>

                                @foreach($types as $type)
                                <option value="{{$type -> title}}"> {{$type -> title}} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" style="margin-bottom: 0.5rem;">Property image here:</label><br>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="categoryDescription" rows="3" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Property</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Property Modal -->
<div class="modal fade" id="viewPropertyModal" tabindex="-1" aria-labelledby="viewPropertyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewPropertyModalLabel">Property Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img id="propertyImage" src="" alt="Property Image" class="img-fluid rounded mb-3">
          </div>
          <div class="col-md-6">
            <p><strong>Title:</strong> <span id="propertyTitle"></span></p>
            <p><strong>Description:</strong> <span id="propertyDescription"></span></p>
            <p><strong>Price:</strong> <span id="propertyPrice"></span></p>
            <p><strong>Category:</strong> <span id="propertyCategory"></span></p>
            <p><strong>Type:</strong> <span id="propertyType"></span></p>
            <p><strong>Status:</strong> <span id="propertyStatus"></span></p>
            <p><strong>Location:</strong> <span id="propertyLocation"></span></p>
          </div>
        </div>
      </div>

      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-warning" id="editPropertyBtn">
          ✏️ Edit Property
        </button>
        <button type="button" class="btn btn-danger" id="deletePropertyBtn">
          🗑️ Delete Property
        </button>
      </div>
    </div>
  </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('tbody tr[data-bs-toggle="modal"]');
        rows.forEach(row => {
            row.addEventListener('click', function () {
                document.getElementById('propertyImage').src = this.dataset.image;
                document.getElementById('propertyTitle').textContent = this.dataset.title;
                document.getElementById('propertyDescription').textContent = this.dataset.description;
                document.getElementById('propertyPrice').textContent = this.dataset.price;
                document.getElementById('propertyCategory').textContent = this.dataset.category;
                document.getElementById('propertyType').textContent = this.dataset.type;
                document.getElementById('propertyStatus').textContent = this.dataset.status;
                document.getElementById('propertyLocation').textContent = this.dataset.location;
            });
        });
    });
</script>



    @include('scripts')
</body>

</html>