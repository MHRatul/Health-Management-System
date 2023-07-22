@extends('backend.doctor.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Profile</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Profile</li>
        <li class="breadcrumb-item active"><a href="#">Profile Edit</a></li>
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
            <h3 class="tile-title">Profile form <a class="btn btn-success float-right btn-sm" href="{{route('doctor.view')}}"><i class="fa fa-list"></i>Doctor List</a></h3>
            <div class="tile-body">
                <form method="POST" action="{{route('doctor.update.profile')}}" id="myForm">
                    @csrf
                <div class="form-group">
                  <label class="control-label">Name <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" value="{{$data->name}}" name="name" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Email<span style="color: red">*</span></label>
                  <input class="form-control" type="email" value="{{$data->email}}" name="email" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Phone <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" value="{{$data->phone}}" name="phone" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Available Time <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" value="{{$data->available_time}}" name="available_time" placeholder="Ex : 10am - 12pm" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Perday Patient View <span style="color: red">*</span> </label>
                  <input class="form-control" type="number" value="{{$data->patient_per_day}}" name="patient_per_day" placeholder="Patient Per day" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" type="text" name="address" rows="4" placeholder="Enter your address">{!! $data->address !!}</textarea>
                </div>
              
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>
          </form>
          </div>
        </div>
      </div>


  </main>
@endsection
