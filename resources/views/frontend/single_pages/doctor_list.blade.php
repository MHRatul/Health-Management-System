@include('frontend.layouts.header');

@include('frontend.layouts.master');

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Doctor List</span>
            <h1 class="text-capitalize mb-5 text-lg">Doctor List</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  @php
    $doctors = App\User::where('role_id',3)->get();
@endphp
  <section class="section service-2">
    <h1 style="text-align: center">Doctor List</h1>
      <div class="container">
          <div class="row">
            @foreach ($doctors as $item)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="{{asset($item->image)}}" alt="" class="img-fluid" style="height: 180px;width:330px">
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Name : {{$item->name}}</h4>
                        <h5 class="mt-4 mb-2 title-color" style="  font-size: 16px;">Department :{{$item->department->name ?? ''}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
      </div>
  </section>

@include('frontend.layouts.footer');

@include('frontend.layouts.master');
