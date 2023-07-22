@extends('backend.patient.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Edit Appointment</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Appointment</li>
        <li class="breadcrumb-item active"><a href="#">Appointments Edit</a></li>
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
            <h3 class="tile-title">Edit Appointment form <a class="btn btn-success float-right btn-sm" href="{{route('patient.appointment.index')}}"><i class="fa fa-list"></i>Appointment List</a></h3>
            <div class="tile-body">
                <form method="POST" action="{{route('patient.appointment.update',$data->id)}}" id="myForm">
                    @csrf
                    @method('patch')
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="usertype">Department<span style="color: red">*</span></label>
                            <select name="department_id" id="usertype" class="form-control" required>
                                <option value="" selected disabled>Select Option</option>
                                @foreach ($departments as $item)
                                  <option value="{{$item->id}}" @php if ($data['department_id'] == $item->id) { echo "selected"; } @endphp>{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="usertype">Doctor<span style="color: red">*</span></label>
                            <select name="doctor_id" id="usertype" class="form-control" required>
                                <option value="" selected disabled>Select Doctor</option>
                                @foreach ($doctors as $item)
                                  <option value="{{$item->id}}" @php if ($data['doctor_id'] == $item->id) { echo "selected"; } @endphp>{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Date <span style="color: red">*</span> </label>
                            <input class="form-control" type="date" value="{{$data->date}}" name="date" required>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Time <span style="color: red">*</span> </label>
                            <input class="form-control" type="time" value="{{$data->time}}" name="time" required>
                          </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                  <label class="control-label">Name<span style="color: red">*</span></label>
                  <input class="form-control" type="text" name="name" value="{{$data->name}}" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Phone <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" name="phone" value="{{$data->phone}}" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Message <span style="color: red">*</span> </label>
                    <textarea class="form-control" type="text" name="message" placeholder="Enter Phone message" required>{{$data->message}}</textarea>
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
