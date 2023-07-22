@extends('backend.admin.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Add Telemedicine</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Telemedicine</li>
        <li class="breadcrumb-item active"><a href="#">Telemedicines Add</a></li>
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
            <h3 class="tile-title">Add Telemedicine form <a class="btn btn-success float-right btn-sm" href="{{route('telemedicine.index')}}"><i class="fa fa-list"></i>Telemedicine List</a></h3>
            <div class="tile-body">
                <form method="POST" action="{{route('telemedicine.store')}}" id="myForm" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                  <label class="control-label">Name <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" name="title" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <label class="control-label">image</label>
                  <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                  <label class="control-label">Status <span style="color: red">*</span> </label>
                  <select name="status" id="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
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
