

@extends('backend.doctor.layouts.app')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
        <h1><i class="fa fa-th-list"></i> Appoinment List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active"><a href="#">Appoinment List</a></li>
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($all_appointment as $key => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->patient->email ?? ''}}</td>
                            <td>{{$item->patient->age ?? ''}}</td>
                            <td>{{$item->patient->blood_group ?? ''}}</td>
                            <td>{{$item->time}}</td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->message}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                @php
                                    if($item->status == 1){
                                    echo  "<div class='badge badge-success badge-shadow'>Completed</div>";
                                    }elseif($item->status == 2){
                                    echo  "<div class='badge badge-danger badge-shadow'>Cancelled</div>";
                                    }else{
                                        echo  "<div class='badge badge-warning badge-shadow'>Pending</div>";
                                    }
                                  @endphp
                            </td>
                            <td>
                                <?php  if($item->status == 1){ ?>
                                    <a href="{{route('doctor.pending-appointment',[$item->id])}}"
                                       class="btn btn-success" title="Cancelled"><i
                                                class="fa fa-arrow-down"></i></a>
                                    <?php }else{ ?>
                                    <a href="{{route('doctor.complete-appointment',[$item->id])}}"
                                       class="btn btn-warning" title="Complete"><i
                                                class="fa fa-arrow-up"></i></a>
                                    <?php } ?>
                                    <a title="Add Prescription" href="{{route('doctor.add-prescription',$item->id)}}"><i class="fa fa-eye btn btn-primary"></i></a>    
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