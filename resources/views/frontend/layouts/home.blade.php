<!DOCTYPE html>
<html lang="zxx">

@include('frontend.layouts.header');

@include('frontend.layouts.slider');

@include('frontend.layouts.master');

<!-- Features part -->
{{-- <section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>24 Hours Service</span>
						<h4 class="mb-3">Online Appoinment</h4>
						<p class="mb-4">Get ALl time support for emergency.We Are online..</p>
						@auth
						<a href="{{url('patient/appointment/create')}}" class="btn btn-main btn-round-full">Make a appoinment</a>
						@else
						<a href="{{route('login')}}" class="btn btn-main btn-round-full">Make a appoinment</a>
						@endauth
					</div>

					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>Timing schedule</span>
						<h4 class="mb-3">Working Hours</h4>
						<ul class="w-hours list-unstyled">
		                    <li class="d-flex justify-content-between">Sun - Wed : <span>8:00 AM - 4:00 PM</span></li>
		                    <li class="d-flex justify-content-between">Thu - Fri : <span>9:00 AM - 4:00 PM</span></li>
		                    <li class="d-flex justify-content-between">Sat - sun : <span>10:00 AM - 4:00 PM</span></li>
		                </ul>
					</div>

					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Emergency Cases</span>
						<h4 class="mb-3">+99234566</h4>
						<p>Any emergency case call this number. We are open 24/7.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}


<!-- About part -->
<section class="section about">
	<div class="container">
		<div class="row align-items-center">
			@php
				$telemedicines = App\Telemedicine::where('status',1)->orderBy('id','desc')->take(2)->get();
			@endphp
			<div class="col-lg-4 col-sm-6">
				<div class="about-img">
					@foreach ($telemedicines as $item)
						<img src="{{asset($item->image)}}" alt="" class="img-fluid">
					@endforeach
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="about-img mt-4 mt-lg-0">
					<img src="{{asset('public/frontend/images/about/img-3.jpg')}}" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="about-content pl-4 mt-4 mt-lg-0">
					<h2 class="title-color">Personal care <br>& healthy living</h2>
					<p class="mt-4 mb-5">Online healthcare system Opening its doors in August 2021 and situated beside the picturesque Gulshan Lake, this hospital is one of the largest private sector healthcare facilities in Bangladesh....</p>

					<a href="{{route('service')}}" class="btn btn-main-2 btn-round-full btn-icon">Services<i class="icofont-simple-right ml-3"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Little summery part -->
<section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3">2</span>k
						<p>Happy People</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-flag"></i>
						<span class="h3">100</span>+
						<p>Surgery Comepleted</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3">40</span>+
						<p>Expert Doctors</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3">5</span>
						<p>Branch</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@php
$doctors = App\User::where('role_id',3)->get();
@endphp
<section class="section service-2" style="padding: 140px !important">
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
<!--Patient care section -->
<section class="section service gray-bg" style="padding: 20px !important">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Patient care</h2>
					<div class="divider mx-auto my-4"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-laboratory text-lg"></i>
						<h4 class="mt-3 mb-3">Laboratory services</h4>
					</div>

					<div class="content">
						<p class="mb-4">We have a lab which has updated equipment.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-heart-beat-alt text-lg"></i>
						<h4 class="mt-3 mb-3">Heart Disease</h4>
					</div>
					<div class="content">
						<p class="mb-4">We have a section for heart patient with modern machine.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-tooth text-lg"></i>
						<h4 class="mt-3 mb-3">Dental Care</h4>
					</div>
					<div class="content">
						<p class="mb-4">We have a dental section with digital equipment.</p>
					</div>
				</div>
			</div>


			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-crutch text-lg"></i>
						<h4 class="mt-3 mb-3">Body Surgery</h4>
					</div>

					<div class="content">
						<p class="mb-4">There is a modern technoloy system surgery also included.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-brain-alt text-lg"></i>
						<h4 class="mt-3 mb-3">Neurology Sargery</h4>
					</div>
					<div class="content">
						<p class="mb-4">We have a section name neurology with experience doctors.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-dna-alt-1 text-lg"></i>
						<h4 class="mt-3 mb-3">Gynecology</h4>
					</div>
					<div class="content">
						<p class="mb-4">We have experience lady doctor for gynecology.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Online appointment -->
{{-- <section class="section appoinment">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 ">
				<div class="appoinment-content">
					<img src="{{asset('public/frontend/images/about/img-3.jpg')}}" alt="" class="img-fluid">
					<div class="emergency">
						<h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>+880171212121</h2>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-10 ">
				<div class="appoinment-wrap mt-5 mt-lg-0">
					<h2 class="mb-2 title-color">Book appoinment</h2>
					<p class="mb-4">Make your appointment through online.  </p>
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
				<form id="#" class="appoinment-form" method="post" action="{{route('make-appointment')}}">
					@csrf
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="department_id" required onchange="getDoctor(this.value)">
									<option value="" disabled selected>--Choose Department--</option>
									@foreach ($departments as $item)
										<option value="{{$item->id}}">{{$item->name}}</option>
									@endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="doctor_id" onchange="getTime(this.value)" name="doctor_id" required>
                                  
                                </select>
								<span id="doctor" style="color: green"></span>
                            </div>
							
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="date" id="date" type="date" class="form-control" placeholder="dd/mm/yyyy" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="time" id="time" type="time" class="form-control" placeholder="Time" required>
								<label for="end-time"></label>
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="name" id="name" type="text" class="form-control" placeholder="Full Name" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="message" id="message" class="form-control" rows="6" placeholder="Your Message" required></textarea>
                    </div>
					@if(Auth::user())
                    <button class="btn btn-main btn-round-full" type="submit" >Make Appoinment <i class="icofont-simple-right ml-2  "></i></button>
					@else
					<a href="{{route('login')}}" class="btn btn-main btn-round-full" type="submit" >Make Appoinment <i class="icofont-simple-right ml-2  "></i></a>
					@endif
                </form>
            </div>
			</div>
		</div>
	</div>
</section> --}}

<!--we served -->
<section class="section testimonial-2 gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>We served over 2000+ Patients</h2>
					<div class="divider mx-auto my-4"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">
				<div class="testimonial-block style-2  gray-bg">
					<i class="icofont-quote-right"></i>

					<div class="testimonial-thumb">
						<img src="{{asset('public/frontend/images/team/test-thumb1.jpg')}}" alt="" class="img-fluid">
					</div>

					<div class="client-info ">
						<h4>Amazing service!</h4>
						<span>Almas</span>
						<p>
							Their treatment very good, their behaviour like friendly.
						</p>
					</div>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="{{asset('public/frontend/images/team/test-thumb2.jpg')}}" alt="" class="img-fluid">
					</div>

					<div class="client-info">
						<h4>Expert doctors!</h4>
						<span>Sanjana Sarkar</span>
						<p>
							Very friendly doctor, every time they keep our track.
						</p>
					</div>

					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="{{asset('public/frontend/images/team/test-thumb3.jpg')}}" alt="" class="img-fluid">
					</div>

					<div class="client-info">
						<h4>Good Support!</h4>
						<span>Kashem</span>
						<p>
							They provide great service facilty.
						</p>
					</div>

					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="{{asset('public/frontend/images/team/test-thumb3.jpg')}}" alt="" class="img-fluid">
					</div>

					<div class="client-info">
						<h4>Nice and clean</h4>
						<span>Washim</span>
						<p>
							They provide great service facilty. Neat and clean.
						</p>
					</div>

					<i class="icofont-quote-right"></i>
				</div>

			</div>
		</div>
	</div>
</section>


@include('frontend.layouts.footer');

@include('frontend.layouts.master');
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    
    //GetSubCat
    var token =  $("input[name=_token]").val();
    function getTime(val){
      var datastr = "doctor_id=" + val  + "&token="+token;
      $.ajax({
        type: "post",
        url:"{{route('get-doctor')}}",
        data:datastr,
        cache:false,
        beforeSend: function() {
            // setting a timeout
        },
        success:function (respone) {     
          document.getElementById('doctor').innerHTML = 'Available at : '+respone.available_time;
  
        },
        error: function (jqXHR, status, err) {
        //   alert(status);
          console.log(err);
        },
        complete: function () {
          // alert("Complete");
        }
      });
    }
	function getDoctor(val){
      var datastr = "department_id=" + val  + "&token="+token;
      $.ajax({
        type: "post",
        url:"{{route('get-doctor-list')}}",
        data:datastr,
        cache:false,
        beforeSend: function() {
            // setting a timeout
        },
        success:function (respone) {     
			$('#doctor_id').html(respone)
  
        },
        error: function (jqXHR, status, err) {
        //   alert(status);
          console.log(err);
        },
        complete: function () {
          // alert("Complete");
        }
      });
    }
  </script>
