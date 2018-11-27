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
								<img src="{{ asset('images/sc-mobile-connect.png') }}" alt="SC Mobile Connect" width="100">
							</div>
						</div>					
					</div>
				</div>

				@if(session('message_status'))

					@if(session('message_status') == 'true')
						<div class="alert alert-success" role="alert">
						  Registration Successful !
						</div>
					@else
						<div class="alert alert-danger" role="alert">
						  Registration Failed ! Record Already Exist.
						</div>
					@endif
				@endif
				
				<p class="form-note">Thank you for your interest in our "<em><strong>SC MOBILE CONNECT</strong></em>"! Please fill out the form to sign up for promotional alerts.</p>
				<form method="POST" action="{{ route('mobileconnect.store') }}" id="mobileconnectform">
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
				      <label>Company Name</label>
				      <span class="error-msg"> required field * </span>
						<input class="form-control" id="businessname_input" name="company_name" placeholder="Company Name" required>
				    </div>
				  </div>
				  <div class="form-row">
				    <!-- <div class="form-group col-md-6">
				    	<label>Industry</label>
				    	<span class="error-msg"> required field * </span>
						<input class="form-control" id="industry_input" name="industry" placeholder="Industry" required>
				    </div> -->
				    <div class="form-group col-md-6">
				      <label>Mobile Number</label>
				      <span class="error-msg"> required field *</span>
				      <div>
					    <input type="tel" class="form-control" id="mobileno_input" name="mobile_no" placeholder="Mobile Number" minlength="10" maxlength='10' required>
					</div>
				      
				    </div>
					<div class="form-group">
					    <label>How did you hear about "<em><strong>SC Mobile CONNECT</strong></em>"?</label>
					    <select class="form-control" id="scmconnect_question_input" name="scmconnect_question" required>
					    	<option value="website">Website</option>
					    	<option value="email">Email</option>
					    	<option value="facebook">Facebook</option>
					    	<option value="instagram">Instagram</option>
						    <option value="twitter">Twitter</option>
						    <option value="direct-mail">Direct Mail</option>
						    <option value="trade-show">Trade Show</option>
						    <option value="print-ads">Print Ads</option>
					    </select>
					 </div>				  
				  </div>
				  

				  <button type="submit" class="btn btn-success submit-btn-blue mobileconnectform-submit-btn">Submit</button>

					</br>
					</br>
					<p class="form-note">
						<span>Terms and Conditions:</span>
					</p>	
					<p class="form-note">
						<span>1. Here is a link to the terms and privacy:</span>
						<span>2. You may receive up to (4) messages per month.</span>
						<span>3. You will receive an enrollment confirmation text.</span>
						<span>4. Reply “STOP” to end or “HELP” for help to any message.</span>
						<span>5. Enrollment is not required for purchase of any product or service.</span>
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