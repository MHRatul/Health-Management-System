@include('frontend.layouts.header');

@include('frontend.layouts.master');

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Our services</span>
            <h1 class="text-capitalize mb-5 text-lg">What We Do</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

@php
    $telemedicines = App\Telemedicine::where('status',1)->get();
@endphp
  <section class="section service-2">
    <h2 style="text-align: center">Telemedicine</h2>
      <div class="container">
          <div class="row">
            @foreach ($telemedicines as $item)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="{{asset($item->image)}}" alt="" class="img-fluid">
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">{{$item->title}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
      </div>
  </section>


@include('frontend.layouts.footer');

@include('frontend.layouts.master');
