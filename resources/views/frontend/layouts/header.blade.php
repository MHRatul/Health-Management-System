<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center" >
				<div class="col-lg-4">
					<ul class="list-inline footer-socials" style="height:28px">
						<li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i class="icofont-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://www.twitter.com/" target="_blank"><i class="icofont-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.linkedin.com/" target="_blank"><i class="icofont-linkedin"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-4">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="#"><i class="icofont-support-faq mr-2"></i>support@onlinehealthcare.com</a></li>
					</ul>
				</div>
				<div class="col-lg-4">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="#" >
							<span>Call Now : </span>
							<span class="h4">01912121212</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="{{route('index')}}">
			  	<img src="{{asset('public/frontend/images/logo.png')}}" alt="" class="img-fluid" width="100px">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="{{route('index')}}">Home</a>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="{{route('about.us')}}">About</a></li>
			   <li class="nav-item"><a class="nav-link" href="{{route('doctor-list')}}">Doctors</a></li>
			    <li class="nav-item"><a class="nav-link" href="{{route('service')}}">Services</a></li>


			   <li class="nav-item"><a class="nav-link" href="{{route('contact.us')}}">Contact</a></li>
			  @auth
			  	<li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">Logout</a></li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
				  </form>
			  @else
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-success" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login/Register<i class="icofont-thin-down"></i></a>
                <ul class="dropdown-menu" aria-labelledby="dropdown05">
                    <li><a class="dropdown-item" href="{{route('login')}}">login</a></li>

                    <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                </ul>
              </li>
			  @endauth
			</ul>
		  </div>
		</div>
	</nav>
</header>
