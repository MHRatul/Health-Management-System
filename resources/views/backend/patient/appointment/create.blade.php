@extends('backend.patient.layouts.app')
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
              @if(session()->has('error'))
						<div class="alert alert-danger">
							{{ session()->get('error') }}
						</div>
					@endif
            <h3 class="tile-title">Add Appointment form <a class="btn btn-success float-right btn-sm" href="{{route('patient.appointment.index')}}"><i class="fa fa-list"></i>Appointment List</a></h3>
            <div class="tile-body">
                <form method="POST" action="{{route('patient.appointment.store')}}" id="myForm">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="usertype">Department<span style="color: red">*</span></label>
                            <select name="department_id" onchange="getDoctor(this.value)" id="usertype" class="form-control" required>
                                <option value="" selected disabled>Select Option</option>
                                @foreach ($departments as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="usertype">Doctor<span style="color: red">*</span></label>
                            <select name="doctor_id" id="doctor_id" onchange="getTime(this.value)" class="form-control" required>

                            </select>
                            <span id="doctor" style="color: green;font-weight: 600"></span>
                          </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Date <span style="color: red">*</span> </label>
                            <input class="form-control" type="date" name="date" required>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Time <span style="color: red">*</span> </label>
                            <input class="form-control" type="time" name="time" required>
                          </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                  <label class="control-label">Name<span style="color: red">*</span></label>
                  <input class="form-control" type="text" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Phone <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" name="phone" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Message <span style="color: red">*</span> </label>
                    <textarea class="form-control" type="text" name="message" placeholder="Enter Phone message" required></textarea>
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

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    
    //GetSubCat
    var token =  $("input[name=_token]").val();
    function getTime(val){
      var datastr = "doctor_id=" + val  + "&token="+token;
      $.ajax({
        type: "post",
        url:"{{route('get-doctor')}}",
        data:datastr,
        cache:false,
        beforeSend: function() {
            // setting a timeout
        },
        success:function (respone) {     
          document.getElementById('doctor').innerHTML = 'Available at : '+respone.available_time;
  
        },
        error: function (jqXHR, status, err) {
          alert(status);
          console.log(err);
        },
        complete: function () {
          // alert("Complete");
        }
      });
    }
    function getDoctor(val){
      var datastr = "department_id=" + val  + "&token="+token;
      $.ajax({
        type: "post",
        url:"{{route('get-doctor-list')}}",
        data:datastr,
        cache:false,
        beforeSend: function() {
            // setting a timeout
        },
        success:function (respone) {     
          $('#doctor_id').html(respone);
  
        },
        error: function (jqXHR, status, err) {
          alert(status);
          console.log(err);
        },
        complete: function () {
          // alert("Complete");
        }
      });
    }
  </script>
