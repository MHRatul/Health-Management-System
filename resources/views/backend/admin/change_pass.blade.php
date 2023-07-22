@extends('backend.admin.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Change Password</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Change Password</li>
        <li class="breadcrumb-item active"><a href="#">Change Password</a></li>
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
                <form method="POST" action="{{route('update.password')}}">
                    @csrf
                <div class="form-group">
                  <label class="control-label">Old Password <span style="color: red">*</span> </label>
                  <input class="form-control" type="password" name="old_password" placeholder="Old Password" required>
                </div>
                <div class="form-group">
                  <label class="control-label">New Password</label>
                  <input class="form-control" type="password" name="password" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
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
