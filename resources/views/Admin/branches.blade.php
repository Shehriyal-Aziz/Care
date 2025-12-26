@extends('Admin.headerfooter')
@section('content')
<div class="container mt-4">

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
            <strong>✓ Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2>Add New Branch</h2>

    <form method="POST" action="{{ route('admin.branches.store') }}">
        @csrf

        <div class="mb-3">
            <label>Branch Name</label>
            <input type="text" name="branch_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Select City</label>
            <select name="city" class="form-control" required>
                <option value="">Select City</option>
                @foreach($cities as $c)
                    <option value="{{ $c->cityname }}">{{ $c->cityname }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="latitude" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="longitude" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Branch</button>
    </form>

</div>


@endsection
