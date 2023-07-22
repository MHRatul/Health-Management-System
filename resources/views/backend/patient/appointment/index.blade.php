

@extends('backend.patient.layouts.app')
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
                    <th>Doctor Name</th>
                    <th>Department Name</th>
                    <th>Name</th>
                    <th>Phone</th>
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
                            <td>{{$item->doctor->name ?? ''}}</td>
                            <td>{{$item->department->name ?? ''}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
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
                                @if($item->status != 1)
                                <a href="{{route('patient.appointment.edit',[$item->id])}}" class="btn-sm btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                                <form action="{{route('patient.appointment.destroy',[$item->id])}}" onclick="return alert('Are You sure to delete this ?')" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                                @else
                                <a href="#" class="btn-sm btn-success" title="Completed"><i class="fa fa-check"></i></a>
                                @endif
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