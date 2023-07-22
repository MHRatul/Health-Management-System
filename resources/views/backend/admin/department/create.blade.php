@extends('backend.admin.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Add Department</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Department</li>
        <li class="breadcrumb-item active"><a href="#">Departments Add</a></li>
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
            <h3 class="tile-title">Add Department form <a class="btn btn-success float-right btn-sm" href="{{route('department.index')}}"><i class="fa fa-list"></i>Department List</a></h3>
            <div class="tile-body">
                <form method="POST" action="{{route('department.store')}}" id="myForm">
                    @csrf
                <div class="form-group">
                  <label class="control-label">Name <span style="color: red">*</span> </label>
                  <input class="form-control" type="text" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Description</label>
                  <textarea class="form-control" type="text" name="description" rows="4" placeholder="Description"></textarea>
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
