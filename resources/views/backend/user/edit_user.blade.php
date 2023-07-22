@extends('backend.admin.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Add User</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active"><a href="#">Users Add</a></li>
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
            <h3 class="tile-title">Add user form <a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}"><i class="fa fa-list"></i>User List</a></h3>
            <div class="tile-body">
                <form method="POST" action="{{route('users.update',$data->id)}}" id="myForm">
                    @csrf
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="usertype">User Role<span style="color: red">*</span></label>
                        <select name="role_id" id="usertype" class="form-control" required>
                            <option value="" selected disabled>Select Option</option>
                            @foreach ($roles as $item)
                              <option value="{{$item->id}}" @php if ($data['role_id'] == $item->id) { echo "selected"; } @endphp>{{$item->name}}</option>
                            @endforeach
                        </select>
                      </div>
                </div>
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
                  <input class="form-control" type="text" name="phone" value="{{$data->phone}}" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" type="text" name="address" rows="4" placeholder="Enter your address">{{$data->address}}</textarea>
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
