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
                    <form method="POST" action="{{route('category.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden"  name="id" value="{{$category->id}}">
                  
                            <div class="form-group">
                            <h5>Category Name English<span class="text-danger"></span></h5>
                            <input type="text" name="category_name_en" class="form-control" value="{{$category->category_name_en}}">
                              </div>
							  @error('category_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
							  <div class="form-group">
                            <h5>Category Name Sinhala<span class="text-danger"></span></h5>

                            <input type="text" name="category_name_sinhala" class="form-control" value="{{$category->category_name_sinhala}}" >
                              </div>
							  @error('category_name_sinhala')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
							  <div class="form-group">
                            <h5>Brand Image<span class="text-danger"></span></h5>

                            <input type="text" name="category_icon" id="brand_image" class="form-control" value="{{$category->category_icon}}">
                              </div>
                           
							  @error('category_icon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="col-md-8">
                         
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

	  @endsection

