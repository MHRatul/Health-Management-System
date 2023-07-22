

   @extends('backend.doctor.layouts.app')
   @section('content')
   <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Prescription List</h1>
          </div>
          <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Prescription</li>
            <li class="breadcrumb-item active"><a href="#">Prescription List</a></li>
          </ul>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Appointment Id</th>
                      <th>Patient Name</th>
                      <th>Guidelines</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($prescription as $key => $item)
                      @php
                          $patient = App\User::find($item->patient_id);
                      @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->appointment_id}}</td>
                            <td>{{$patient->name ?? ''}}</td>
                            <td>{{$item->guidelines ?? ''}}</td>
                            <td><img src="{{$item->file}}" alt="" width="80px"></td>
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