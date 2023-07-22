<!DOCTYPE html>
<html lang="zxx">

@include('frontend.layouts.header');
  
  <section class="contact-form-wrap section">
	  <div class="container">
		  <div class="row justify-content-center">
			  <div class="col-lg-6">
				  <div class="section-title text-center">
					  <h2 class="text-md mb-2">Register Patient</h2>
					  <div class="divider mx-auto my-4"></div>
					  <p class="mb-5">Laboriosam exercitationem molestias beatae eos pariatur, similique, excepturi mollitia sit perferendis maiores ratione aliquam?</p>
				  </div>
			  </div>
		  </div>
		  <div class="row">
			  <div class="col-lg-8 col-md-8 col-sm-8 offset-md-2 offset-sm-2 offset-lg-2">
				  <form method="post" action="{{route('register')}}" name="form1">
					@csrf
				   <!-- form message -->
					  <div class="row">
						  <div class="col-12">
							  <div class="alert alert-success contact__msg" style="display: none" role="alert">
								  Your message was sent successfully.
							  </div>
						  </div>
					  </div>
  
					  <div class="row">
						  <div class="col-lg-6">
							  <div class="form-group">
								  <input name="name" id="name" type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Your Full Name" required>
								  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  </div>
						  </div>
  
						  <div class="col-lg-6">
							  <div class="form-group">
								  <input name="email" id="email" value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email Address" required>
								  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  </div>
						  </div>
						  <div class="col-lg-6">
							<div class="form-group">
								<input name="phone" id="subject" minlength="11" maxlength="11" type="text" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Your Phone" required>
								@error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input name="blood_group" id="subject" type="text" value="{{old('blood_group')}}" class="form-control @error('blood_group') is-invalid @enderror" placeholder="Blood Group" required>
								@error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input name="age" id="subject" type="text" class="form-control @error('age') is-invalid @enderror" value="{{old('age')}}" placeholder="Age" required>
								@error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						 <div class="col-lg-6">
							<div class="form-group">
								<select name="gender" id="" class="form-control" required>
									<option value="" selected disabled>--select gender--</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password" required>
								@error('password')
								  <span class="invalid-feedback" role="alert">
									  <strong>{{ $message }}</strong>
								  </span>
							  @enderror
							</div>
						</div>
						<div class="col-lg-6">
						  <div class="form-group">
							  <input name="password_confirmation" id="subject" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter Your Confirm Password" required>
							  @error('password_confirmation')
								  <span class="invalid-feedback" role="alert">
									  <strong>{{ $message }}</strong>
								  </span>
							  @enderror
						  </div>
					  </div>
						   <div class="col-lg-12">
							  <div class="form-group">
								  <textarea name="address" id="subject" type="text" class="form-control" placeholder="Your Address" required></textarea>
							  </div>
						  </div>
	
					  </div>
  
					  <div class="text-center">
						  <button class="btn btn-main btn-round-full" onclick="ValidateEmail(document.form1.email)" type="submit" value="Register">Register</button>
					  </div>
				  </form>
			  </div>
		  </div>
	  </div>
  </section>
  
  

@include('frontend.layouts.master');

<script>
	function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
// alert("Valid email address!");
document.form1.email.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.email.focus();
return false;
}
}

</script>
@include('frontend.layouts.footer');

@include('frontend.layouts.master');