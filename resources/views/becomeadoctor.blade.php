@extends('headerfooter')
@section('content')


<div class="container">
    @if(@session('success'))
    <div
        class="alert alert-success alert-dismissible fade show"
        role="alert">
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
        <strong>Alert</strong> Application submitted successfully.
    </div>

    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert);
        });
    </script>

    @endif
    <div class="row">

        @if(Auth::user()->doctorstatus == 'null')
        <div class="col-md-12">
            <h1>Become a Doctor</h1>
            <p>Thank you for your interest in becoming a doctor. Please fill out the form below to apply.</p>
            <form action="/requestfordoctor" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" value="{{Auth::user()->name}}" readonly class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" value="{{Auth::user()->email}}" readonly class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="specialization">Department</label>
                    <select class="form-control" id="specialization" name="specialization" required>
                        <option value="" disabled selected>Select Department</option>
                        <option value="Cardiology">Cardiology</option>
                        <option value="Neurology">Neurology</option>
                        <option value="Orthopedics">Orthopedics</option>
                        <option value="Pediatrics">Pediatrics</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Gynecology">Gynecology</option>
                        <option value="Oncology">Oncology</option>
                        <option value="Psychiatry">Psychiatry</option>
                        <option value="Radiology">Radiology</option>
                        <option value="General Medicine">General Medicine</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="experience">Years of Experience</label>
                    <input type="number" class="form-control" id="experience" name="experience" required>
                </div>
                <div class="form-group">
                    <label for="cv">Upload CV</label>
                    <input type="file" class="form-control-file" id="cv" name="cv" required>
                </div>
                <div class="form-group">
                    <select name="citylist" class="w-100 p-1 form-control" id="">
                        <option value="">Select Residence City</option>
                        @foreach($cities as $c)
                        <option value="{{$c->cityname}}">{{$c->cityname}}</option>
                        @endforeach
                    </select>
                </div>
                <div >
                    <select class="form-control" name="branch_id" id="branch_id" required>
                        <option disabled selected>Select Branch</option>
                        @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->branch_name }} ({{ $branch->city }})</option>
                        @endforeach
                    </select>
<br>
                    
                </div>
                </div>
                <button  type="submit" class=" form-control btn btn-primary">Submit Application</button>
            </form>
            @endif

            @if(Auth::user()->doctorstatus == 'pending')
            <h1>Application Pending</h1>
            <p>Your application to become a doctor is currently under review. We will notify you once the review is complete.</p>
            @endif
            @if(Auth::user()->doctorstatus == 'accepted')
            <h1>Application Accepted</h1>
            <p>Congratulations! Your application to become a doctor has been accepted. You can now access the doctor dashboard.</p>
            <a href="/dashboard" class="btn btn-success">Go to Doctor Dashboard</a>
            @endif
        </div>
        @endsection