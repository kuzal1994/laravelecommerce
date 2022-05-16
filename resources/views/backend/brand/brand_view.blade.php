

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
								<th>Brand Name English</th>
								<th>Brand Name Sinhala</th>
								<th>Image</th>
								<th>Action</th>
							
							</tr>
						</thead>
						<tbody>
                            @foreach($brands as $item)
							<tr>
								<td>{{$item->brand_name_en}}</td>
								<td>{{$item->brand_name_sinhala}}</td>
								<td><img src="{{asset($item->brand_image)}}" style="width:70px;height:40px">


                                </td>
								<td>
                                    <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info">Edit</a>
							    <a href="{{route('brand.delete',$item->id)}}"  class="btn btn-danger" id="delete">Delete</a>

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
				  <h3 class="box-title">Add Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
            @csrf
					 
                            <div class="form-group">
                            <h5>Brand Name English<span class="text-danger"></span></h5>
                            <input type="text" name="brand_name_en" class="form-control" >
                              </div>
							  @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
							  <div class="form-group">
                            <h5>Brand Name Sinhala<span class="text-danger"></span></h5>

                            <input type="text" name="brand_name_sinhala" class="form-control" >
                              </div>
							  @error('brand_name_sinhala')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
							  <div class="form-group">
                            <h5>Brand Image<span class="text-danger"></span></h5>

                            <input type="file" name="brand_image" >
                              </div>
                           
							  @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                      
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

