<style>
    /* Form Container Styling */
    .form-wrapper {
        background: linear-gradient(135deg, #f8fff8 0%, #ffffff 100%);
        border-radius: 15px;
        padding: 2.5rem;
        margin: 2rem;
        box-shadow: 0 8px 24px rgba(34, 139, 34, 0.1);
        border: 2px solid #90EE90;
    }

    /* Heading Styling */
    .form-wrapper h2 {
        color: #228B22;
        font-weight: 600;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #90EE90;
    }

    /* Form Labels */
    .form-wrapper label {
        color: #2d5016;
        font-weight: 500;
        margin-bottom: 0.5rem;
        display: block;
    }

    /* Form Controls */
    .form-wrapper .form-control {
        border: 2px solid #90EE90;
        border-radius: 8px;
        padding: 0.75rem;
        transition: all 0.3s ease;
        background-color: #f9fff9;
        color: #2d5016;
        width: 100%;
    }

    .form-wrapper .form-control:focus {
        border-color: #228B22;
        box-shadow: 0 0 0 0.2rem rgba(34, 139, 34, 0.15);
        background-color: white;
        outline: none;
    }

    .form-wrapper .form-control::placeholder {
        color: #90EE90;
    }

    /* Select Dropdown */
    .form-wrapper select.form-control {
        cursor: pointer;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23228B22' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 12px;
        padding-right: 2.5rem;
    }

    /* Button Styling */
    .form-wrapper .btn-primary {
        background: linear-gradient(135deg, #32CD32 0%, #228B22 100%);
        border: none;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(34, 139, 34, 0.3);
        cursor: pointer;
    }

    .form-wrapper .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(34, 139, 34, 0.4);
        background: linear-gradient(135deg, #228B22 0%, #1a6b1a 100%);
    }

    .form-wrapper .btn-primary:active {
        transform: translateY(0);
        box-shadow: 0 2px 8px rgba(34, 139, 34, 0.3);
    }

    /* Success Alert */
    .form-wrapper .alert-success {
        background: linear-gradient(135deg, #90EE90 0%, #98FB98 100%);
        border: 2px solid #32CD32;
        border-radius: 10px;
        color: #1a5010;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(34, 139, 34, 0.15);
    }

    .form-wrapper .alert-success strong {
        color: #228B22;
        font-weight: 600;
    }

    .form-wrapper .alert-success .btn-close {
        filter: invert(29%) sepia(89%) saturate(1000%) hue-rotate(90deg);
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }

    .form-wrapper .alert-success .btn-close:hover {
        opacity: 1;
    }

    /* Spacing */
    .form-wrapper .mb-3 {
        margin-bottom: 1.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-wrapper {
            padding: 1.5rem;
            margin: 1rem;
        }

        .form-wrapper h2 {
            font-size: 1.5rem;
        }

        .form-wrapper .btn-primary {
            width: 100%;
        }
    }
</style>

<div class="form-wrapper">
    <!-- Success Alert -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
        <strong>✓ Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="/dashboard" style="text-decoration: none;" class="btn btn-primary">
        Back to Dashboard >
    </a>

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