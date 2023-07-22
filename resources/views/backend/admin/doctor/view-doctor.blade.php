

   @extends('backend.admin.layouts.app')
   @section('content')
   <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Doctors List</h1>
          </div>
          <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Doctor</li>
            <li class="breadcrumb-item active"><a href="#">Doctors List</a></li>
          </ul>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                @if(session()->has('message'))
						<div class="alert alert-success">
							{{ session()->get('message') }}
						</div>
					@endif
					@if(session()->has('error'))
						<div class="alert alert-danger">
							{{ session()->get('error') }}
						</div>
					@endif
                <a class="btn btn-success float-right btn-sm" href="{{route('doctor.add')}}"><i class="fa fa-plus-circle"></i>Add Doctor</a>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Department</th>
                      <th>Patient Per Day</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($allData as $key => $user)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->department->name ?? ''}}</td>
                      <td>{{$user->patient_per_day ?? ''}}</td>
                      <td><img src="{{asset($user->image)}}" alt="" width="120px"></td>
                      <td>
                          <a title="Edit" href="{{route('doctor.edit',$user->id)}}"><i class="fa fa-edit btn btn-primary"></i></a>
                          <a title="Delete" onclick="return confirm('Are You Sure ? Want to delete!?')" href="{{route('doctor.delete',$user->id)}}"><i class="fa fa-trash btn btn-danger"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
@endsection