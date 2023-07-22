@extends('backend.admin.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Add Doctor</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Doctor</li>
        <li class="breadcrumb-item active"><a href="#">Doctors Add</a></li>
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
            <h3 class="tile-title">Add Doctor form <a class="btn btn-success float-right btn-sm" href="{{route('doctor.view')}}"><i class="fa fa-list"></i>Doctor List</a></h3>
            <div class="tile-body">
                <form method="POST" action="{{route('doctor.store')}}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="usertype">Department<span style="color: red">*</span></label>
                            <select name="department_id" id="usertype" class="form-control" required>
                                <option value="" selected disabled>Select Option</option>
                                @foreach ($departments as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                <div class="form-group">
                  <label class="control-label">Name <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" name="name" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Email<span style="color: red">*</span></label>
                  <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Phone <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" name="phone" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Available Time <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" name="available_time" placeholder="Ex : 10am - 12pm" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Perday Patient View <span style="color: red">*</span> </label>
                  <input class="form-control" type="number" name="patient_per_day" placeholder="Patient Per day" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Image<span style="color: red">*</span></label>
                  <input class="form-control" type="file" name="image" placeholder="" required>
                </div> 
                <div class="form-group">
                  <label class="control-label">Password<span style="color: red">*</span></label>
                  <input class="form-control" type="password" name="password" id="password" placeholder="" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Confirm Password<span style="color: red">*</span></label>
                  <input class="form-control" type="password" name="password_confirmation" id="password2" placeholder="">
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" type="text" name="address" rows="4" placeholder="Enter your address"></textarea>
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
