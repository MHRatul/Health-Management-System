@extends('backend.admin.layouts.app')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          @php
              $users = App\User::count();
              $doctors = App\User::where('role_id',3)->count();
              $patients = App\User::where('role_id',2)->count();
              $appointment = App\Appointment::count();
          @endphp
          <h4>Users</h4>
          <p><b>{{$users}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-stethoscope fa-3x"></i>
        <div class="info">
          <h4>Doctors</h4>
          <p><b>{{$doctors}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
        <div class="info">
          <h4>Appointment</h4>
          <p><b>{{$appointment}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-wheelchair fa-3x"></i>
        <div class="info">
          <h4>Patient</h4>
          <p><b>{{$patients}}</b></p>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection