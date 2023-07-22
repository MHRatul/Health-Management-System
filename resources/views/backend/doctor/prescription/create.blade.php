@extends('backend.doctor.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Add Appointment</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Appointment</li>
        <li class="breadcrumb-item active"><a href="#">Appointments Add</a></li>
      </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
            <h3 class="tile-title">Add Description form <a class="btn btn-success float-right btn-sm" href="{{route('patient.appointment.index')}}"><i class="fa fa-list"></i>Appointment List</a></h3>
            <div class="tile-body">
                <form method="POST" action="{{route('doctor.prescription.store')}}" id="myForm" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                  <label class="control-label">Patient Name<span style="color: red">*</span></label>
                  <input class="form-control" type="text" readonly value="{{$appointment->name}}" name="name" placeholder="Enter your name" required>
                  <input class="form-control" type="hidden" value="{{$appointment->id}}" name="appointment_id" placeholder="Enter your name" required>
                  <input class="form-control" type="hidden" value="{{$appointment->user_id}}" name="patient_id" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Image File(Only JPG, PNG, GIF, BMP or WebP files)<span style="color: red">*</span></label>
                    <input class="form-control" type="file" name="file" placeholder="Enter your name" required>
                  </div>
                <div class="form-group">
                    <label class="control-label">Guidelines <span style="color: red">*</span> </label>
                    <textarea class="form-control" type="text" name="guidelines" placeholder="Enter Guidelines" required></textarea>
                  </div>
               
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>


  </main>
@endsection
