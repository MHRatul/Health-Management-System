<!DOCTYPE html>
<html lang="zxx">

@include('frontend.layouts.header');

  <section class="contact-form-wrap section">
	  <div class="container">
		  <div class="row justify-content-center">
			  <div class="col-lg-6">
				  <div class="section-title text-center">
					  <h2 class="text-md mb-2">Patient/Doctor Login</h2>
					  <div class="divider mx-auto my-4"></div>
				  </div>
			  </div>
		  </div>
		  <div class="row">
			
			  <div class="col-lg-8 col-md-8 col-sm-8 offset-md-2 offset-sm-2 offset-lg-2">
				@if(session('error'))
			<span style="color:red">
				{{ session('error') }}
			</span>
			@endif
				  <form method="post" action="{{route('login')}}" name="form1">
					@csrf
				   <!-- form message -->


					  <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Login As</label>
                                <select name="login_as" id="" class="form-control">
                                    <option value="2">Patient</option>
                                    <option value="3">Doctor</option>
                                </select>

                            </div>
                        </div>
						  <div class="col-lg-12">
							  <div class="form-group">
								<label for="">Email</label>
								  <input name="email" id="email" type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Your Full Email" required>
								  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  </div>
						  </div>

						  <div class="col-lg-12">
							  <div class="form-group">
								<label for="">Password</label>
								  <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your Password" required>
								  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  </div>
						  </div>


					  <div class="text-center">
						  <button class="btn btn-main btn-round-full" type="submit" value="Login">Login</button>
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
