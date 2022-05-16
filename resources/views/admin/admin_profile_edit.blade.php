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
			  <h4 class="box-title">Admin profile Edit</h4>
			
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
            @csrf
					  <div class="row">
						<div class="col-12">
                            
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                            <h5>Admin Name <span class="text-danger">*</span></h5>

                            <input type="text" name="name" value="{{$editadminData->name}}"class="form-control" required="">
                              </div>
                            </div><!---end of col 6--->


                            <div class="col-md-6">

                            <div class="form-group">
                             <h5>Admin Email <span class="text-danger">*</span></h5>

                              <input type="email" name="email" value="{{$editadminData->email}}"class="form-control" required="">
                              </div>

                            </div><!---end of col 6--->
                        </div><!---end of row--->
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>File Input Field <span class="text-danger">*</span></h5>
								
									<input type="file" name="profile_photo_path" class="form-control" required="" id="image">
							</div>
                            </div><!---end col 6-->

                            <div class="col-md-6">
                            <img id="showimg" src="{{!empty($adminData->profile_photo_path)?url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg')}}" style="width :100px; height:100px;">
                            </div><!---end col 6-->
                        </div><!---end row--->
						
                         

                      
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
  
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){//The change event occurs when the value of an element has been changed
      var redaer=new FileReader();//ts web applications asynchronously read the contents of files (or raw data buffers) stored on the user's computer, 

      redaer.onload=function(e){
          $('#showimg').attr('src',e.target.result)
      }
      redaer.readAsDataURL(e.target.files['0']);
        });
    });
    </script>


@endsection