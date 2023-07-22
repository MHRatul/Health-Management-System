

   @extends('backend.admin.layouts.app')
   @section('content')
   <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Nurse List</h1>
          </div>
          <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active"><a href="#">Nurse List</a></li>
          </ul>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <a class="btn btn-success float-right btn-sm" href="{{route('users.add')}}"><i class="fa fa-plus-circle"></i>Add Nurse</a>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($allData as $key => $user)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role->name ?? ''}}</td>
                      <td>
                          <a title="Edit" href=""><i class="fa fa-edit btn btn-primary"></i></a>
                          <a title="Delete" href=""><i class="fa fa-trash btn btn-danger"></i></a>
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