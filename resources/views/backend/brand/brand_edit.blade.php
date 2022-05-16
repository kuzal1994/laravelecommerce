@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		

			
            <!-----Add brand----->

            <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method="POST" action="{{route('brand.update',$brand->id)}}" enctype="multipart/form-data">
            @csrf
					 <input type="hidden"  name="id" value="{{$brand->id}}">
                     <input type="hidden"  name="old_image" value="{{$brand->brand_image}}">
                            <div class="form-group">
                            <h5>Brand Name English<span class="text-danger"></span></h5>
                            <input type="text" name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}">
                              </div>
							  @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
							  <div class="form-group">
                            <h5>Brand Name Sinhala<span class="text-danger"></span></h5>

                            <input type="text" name="brand_name_sinhala" class="form-control" value="{{$brand->brand_name_sinhala}}" >
                              </div>
							  @error('brand_name_sinhala')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
							  <div class="form-group">
                            <h5>Brand Image<span class="text-danger"></span></h5>

                            <input type="file" name="brand_image" id="brand_image">
                              </div>
                           
							  @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="col-md-8">
                            <img id="showimg" src="{{!empty($brand->brand_image)?url('upload/brand/'.$brand->brand_image):url('upload/no_image.jpg')}}" style="width :100px; height:100px;">
                            </div><!---end col 6-->
                        </div><!---end row--->
                            <div class="text-xs-right">
							<input type="submit" class="btn btn-info btn-rounded mt-10" value="Add Product">
						</div>
					</form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

		     
			</div>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#brand_image').change(function(e){//The change event occurs when the value of an element has been changed
      var redaer=new FileReader();//ts web applications asynchronously read the contents of files (or raw data buffers) stored on the user's computer, 

      redaer.onload=function(e){
          $('#showimg').attr('src',e.target.result)
      }
      redaer.readAsDataURL(e.target.files['0']);
        });
    });
    </script>
  
	  @endsection

