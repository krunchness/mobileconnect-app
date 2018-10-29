@extends('layouts.home-layout')

@section('content')
	<div class="row justify-content-center">
		<div class="col-lg-9">
			<div class="form-container">
				<div class="site-logo">
					<img src="{{ asset('images/strategic-logo.jpg') }}" width="400">
				</div>

				<p class="form-note">Thank you for your interest in our "<em><strong>CP MOBILE CONNECT</strong></em>"! Please fill out the form to sign up for promotional alerts.</p>
				<form method="POST" action="{{ route('cruisehome.store') }}" id="cruiseform">
					{{ csrf_field() }}
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label>First Name</label>
				      <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
				    </div>
				    <div class="form-group col-md-6">
				      <label>Last Name</label>
				      <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label>Email Address</label>
						<input class="form-control" name="email_address" type="email" placeholder="Email Address" required>
				    </div>
				    <div class="form-group col-md-6">
				      <label>Business Name</label>
						<input class="form-control" name="business_name" placeholder="Business Name" required>
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				    	<label>Industry</label>
				      	<select class="form-control" name="cpconnect_question" required>
					    	<option value="website">Website</option>
					    </select>
				    </div>
				    <div class="form-group col-md-6">
				      <label>Mobile Number</label>
				      <div data-tip="Format: (123)123-1234">
					    <input type="tel" class="form-control" name="mobile_no" placeholder="Mobile Number" pattern="[\(]\d{3}[\)]\d{3}[\-]\d{4}">
					</div>
				      
				    </div>
				  </div>
				  
				  <div class="form-group">
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
				  </div>
				  <button type="submit" class="btn btn-success cruiseform-submit-btn">Submit</button>

					</br>
					</br>
					<p class="form-note">
						<span><a href="https://www.cruisetheworldvacations.com/page/25626-Texting%20Terms%20of%20Use%20and%20Privacy%20Statement">Here is the link to the terms and privacy:</a></span>
					</p>	
					<p class="form-note">
						<span>1. By entering this contest, you are consenting to receiving up to (4) text messages from Strategic Connection, but not limited to this contest or the Small Business Expo.</span>
						<span>2. Message and data rates may apply</span>
						<span>3. No purchase necessary & you must be at least 18 years old to enter</span>
					</p>
					<p class="form-note">Enrollment is not required for purchase of any product or service.</p>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('head-custom')

	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/gijgo/css/gijgo.min.css') }}">
	<script type="text/javascript" src="{{ asset('vendor/gijgo/js/gijgo.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vendor/moment.js/moment.min.js') }}"></script>
@endsection

@section('footer-custom')
	<script>
        // $('#bday-picker').datepicker({
        // 	uiLibrary: 'bootstrap4'
        // });

        // $('#anniv-picker').datepicker({
        // 	uiLibrary: 'bootstrap4'
        // });


        $('#cruiseform').submit(function(e){
        	// e.preventDefault();

        	var errorCounter = 0;
        	// if (moment($('#anniv-picker').val(), 'MM/DD/YYYY',true).isValid() == false) {
        	// 	alert('Please Use The DatePicker for Anniversary Date To Have a Correct Format');

        	// 	errorCounter++;

        	// 	return false;
        	// }

        	// if (moment($('#bday-picker').val(), 'MM/DD/YYYY',true).isValid() == false) {
        	// 	alert('Please Use The DatePicker for Birth Date To Have a Correct Format');

        	// 	errorCounter++;
        	// 	return false;
        	// }

        	// if (errorCounter == 0) {
        	// 	$('.cruiseform-submit-btn').submit();
        	// }
		    
        });
    </script>
@endsection