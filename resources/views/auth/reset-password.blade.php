@extends('frontend.main_master')
@section('content')

	<!-- ============================================== TOP MENU ============================================== -->


	<!-- ============================================== NAVBAR ============================================== -->

<!-- ============================================== NAVBAR : END ============================================== -->


<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Reset Password</h4>
	
	
	<form  method="POST" action="{{ route('password.update') }}" class="register-form outer-top-xs" role="form">
		@csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Enter Email Address <span>*</span></label>
		    <input type="email" name="email" id="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
        @error('email')
                                 <span class="text-danger">{{$message}}</span>
                                  @enderror
	  	
                                  <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Enter New Password <span>*</span></label>
		    <input type="password" name="password" id="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
        @error('password')
                                 <span class="text-danger">{{$message}}</span>
                                  @enderror

                                  <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm New Password <span>*</span></label>
		    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
       

	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset your password</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================================= FOOTER ============================================================= -->

<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
	<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script>
	<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
	<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
	<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>


    <script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
@endsection


