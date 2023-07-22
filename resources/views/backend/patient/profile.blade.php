@extends('backend.patient.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Profile</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Patient</li>
        <li class="breadcrumb-item active"><a href="#">Patients Add</a></li>
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
            <div class="tile-body">
                <form method="POST" action="{{route('patient.update.profile')}}" id="myForm">
                    @csrf
                <div class="form-group">
                  <label class="control-label">Name <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Email<span style="color: red">*</span></label>
                  <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Phone <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" type="text" name="address" rows="4" placeholder="Enter your address">{{Auth::user()->address}}</textarea>
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
