@extends('layouts.home-layout')

@section('content')
	<div class="row justify-content-center">
		<div class="col-lg-9">
			<div class="form-container">
				<div class="site-logo-container">
					<div class="row">
						<div class="col-lg-6">
							<div class="site-logo">
								<img src="{{ asset('images/strategic-logo.jpg') }}" width="400">
							</div>
						</div>

						<div class="col-lg-6">
							<div class="site-banner">
								<img src="{{ asset('images/text-to-win.jpg') }}" alt="Text To Win">
							</div>
						</div>					
					</div>
				</div>

				<!-- <p class="form-note">Thank you for your interest in our "<em><strong>CP MOBILE CONNECT</strong></em>"! Please fill out the form to sign up for promotional alerts.</p> -->
				<form method="POST" action="{{ route('strategyhome.store') }}" id="strategyform">
					{{ csrf_field() }}
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label>First Name</label>
				      <span class="error-msg"> required field * </span>
				      <input type="text" class="form-control" id="firstname_input" name="first_name" placeholder="First Name" required>
				    </div>
				    <div class="form-group col-md-6">
				      <label>Last Name</label>
				      <span class="error-msg"> required field * </span>
				      <input type="text" class="form-control" id="lastname_input" name="last_name" placeholder="Last Name" required>
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label>Email Address</label>
				      <span class="error-msg"> required field * </span>
					  <input class="form-control" id="email_input" name="email" type="email" placeholder="Email Address" required>
				    </div>
				    <div class="form-group col-md-6">
				      <label>Business Name</label>
				      <span class="error-msg"> required field * </span>
						<input class="form-control" id="businessname_input" name="business_name" placeholder="Business Name" required>
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				    	<label>Industry</label>
				    	<span class="error-msg"> required field * </span>
						<input class="form-control" id="industry_input" name="industry" placeholder="Industry" required>
				    </div>
				    <div class="form-group col-md-6">
				      <label>Mobile Number</label>
				      <span class="error-msg"> required field *</span>
				      <div>
					    <input type="tel" class="form-control" id="mobileno_input" name="mobile_no" placeholder="Mobile Number" minlength="10" maxlength='10' required>
					</div>
				      
				    </div>
				  </div>
				  
				  <!-- <div class="form-group">
				    <label>How did you hear about "<em><strong>CP Mobile CONNECT</strong></em>"?</label>
				    <select class="form-control" name="cpconnect_question" required>
				      <option value="website">Website</option>
				      <option value="email">Email</option>
				      <option value="facebook">Facebook</option>
				      <option value="instagram">Instagram</option>
				      <option value="twitter">Twitter</option>
				      <option value="direct-mail">Direct Mail</option>
				      <option value="show">Show</option>
				      <option value="print-ads">Print Ads</option>
				    </select>
				  </div>-->				  

				  <button type="submit" class="btn btn-success submit-btn-blue strategyform-submit-btn">Submit</button>

					</br>
					</br>
					<p class="form-note">
						<span>Terms and Conditions:</span>
					</p>	
					<p class="form-note">
						<span>1. By entering this contest, you are consenting to receiving up to (4) text messages from Strategic Connection, but not limited to this contest or the Small Business Expo.</span>
						<span>2. Message and data rates may apply</span>
						<span>3. No purchase necessary & you must be at least 18 years old to enter</span>
					</p>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('head-custom')

	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/gijgo/css/gijgo.min.css') }}">
	<script type="text/javascript" src="{{ asset('vendor/gijgo/js/gijgo.min.js') }}"></script>
@endsection

@section('footer-custom')
@endsection