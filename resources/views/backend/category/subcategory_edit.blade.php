@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		

		



            <!-----Add brand----->

            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Sub Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method="POST" action="{{route('subcategory.update')}}" enctype="multipart/form-data">
            @csrf
					 <input type="hidden" name="id" value="{{ $subcategory->id}}">
            <div class="form-group">
								<h5>Category Select<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" id="select" required class="form-control">
										<option value="" selected="" disabled="">Select Category</option>
										@foreach($caegoriets as $category)
										<option value="{{$category->id}}"  {{$category->id== $subcategory-> category_id? 'selected':''}}>{{$category->category_name_en }}</option>
										@endforeach
										
									</select>
									@error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
								</div>
							</div>
							  <div class="form-group">
                            <h5>Sub Category Name English<span class="text-danger"></span></h5>

                            <input type="text" name="subcategory_name_english" class="form-control" value="{{$subcategory->subcategory_name_en}}" >
                              </div>
							  @error('subcategory_name_english')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
							  <div class="form-group">
                            <h5>Sub Category Name sinhala<span class="text-danger"></span></h5>

                            <input type="text" name="subcategory_name_sinhala" class="form-control" value="{{$subcategory->subcategory_name_sinhala}}">
                              </div>
                           
							  @error('subcategory_name_sinhala')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                      
                            <div class="text-xs-right">
							<input type="submit" class="btn btn-info btn-rounded mt-10" value="Add Category">
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


