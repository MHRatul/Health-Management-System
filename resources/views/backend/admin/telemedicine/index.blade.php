

   @extends('backend.admin.layouts.app')
   @section('content')
   <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Telemedicine List</h1>
          </div>
          <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active"><a href="#">Telemedicine List</a></li>
          </ul>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <a class="btn btn-success float-right btn-sm" href="{{route('telemedicine.create')}}"><i class="fa fa-plus-circle"></i>Add Telemedicine</a>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $key => $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->title}}</td>
                      <td><img src="{{asset($item->image)}}" alt="{{$item->title}}" width="120px"></td>
                      <td>
                          <a title="Edit" href="{{route('telemedicine.edit',$item->id)}}"><i class="fa fa-edit btn btn-primary"></i></a>
                          <form action="{{route('telemedicine.destroy',[$item->id])}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
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