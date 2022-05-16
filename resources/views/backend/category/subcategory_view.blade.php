@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		

			<div class="col-9">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brand List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                            <th>Category Id</th>
								<th>Category Name English</th>
								<th>Category Name Sinhala</th>
							
								<th>Action</th>
							
							</tr>
						</thead>
						<tbody>
                            @foreach($subcategory as $item)
							<tr>
								<td>{{$item->category_id }}</td>
								<td>{{$item->subcategory_name_en}}</td>
                                <td>{{$item->subcategory_name_sinhala}}</td>
                               
								


                                </td>
								<td>
                                    <a href="" class="btn btn-info"><i class="fa fa-pencil"></i></a>
							    <a href=""  class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

                                </td>
							</tr>
							@endforeach

					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

		     
			</div>
			<!-- /.col -->



            <!-----Add brand----->

            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf
					 
            <div class="form-group">
								<h5>Category Select<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="select" id="select" required class="form-control">
										<option value="">Select Your City</option>
										<option value="1">India</option>
										<option value="2">USA</option>
										<option value="3">UK</option>
										<option value="4">Canada</option>
										<option value="5">Dubai</option>
										<option value="5">Dubai</option>
									</select>
								</div>
							</div>
							  <div class="form-group">
                            <h5>Sub Category Name English<span class="text-danger"></span></h5>

                            <input type="text" name="category_name_sinhala" class="form-control" >
                              </div>
							  @error('category_name_sinhala')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
							  <div class="form-group">
                            <h5>Sub Category Name sinhala<span class="text-danger"></span></h5>

                            <input type="text" name="category_icon" class="form-control">
                              </div>
                           
							  @error('category_icon')
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

