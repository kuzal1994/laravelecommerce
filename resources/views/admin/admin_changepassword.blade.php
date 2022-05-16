@extends('admin.admin_master')
@section('admin')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head> 
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Password Change</h4>
			
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('admin.update.password')}}" method="post">
            @csrf
					  <div class="row">
						<div class="col-12">
                            
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                            <h5>Current Password<span class="text-danger">*</span></h5>

                            <input type="password" name="oldpassword" id="current_password" value=""class="form-control" required="">
                              </div>

							  <div class="form-group">
                            <h5>New Password<span class="text-danger">*</span></h5>

                            <input type="password" name="password" id="password" value=""class="form-control" required="">
                              </div>

							  <div class="form-group">
                            <h5>Confirm new Password<span class="text-danger">*</span></h5>

                            <input type="password" name="password_confirmation" id="password_confirmation" value=""class="form-control" required="">
                              </div>
                            </div><!---end of col 6--->
                        </div><!---end of row--->
                      

                      
                            <div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info">Submit</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  



@endsection