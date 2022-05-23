@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		

			<div class="col-10">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">subcategory List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                            <th>Category </th>
								<th>Sub-Category Name English</th>
								<th>Sub-sub-Category Name English</th>
							
								<th>Action</th>
							
							</tr>
						</thead>
						<tbody>
                          @foreach($subcategory as $item) 
							<tr>
							<td>{{$item['catgory']['category_name_en'] }}</td>
								<td>{{$item->subcategory_name_en}}</td>
                                <td>{{$item->subcategory_name_sinhala}}</td>
                               
								


                                </td>
								<td width="30%">
                                    <a href="{{route('subcategory.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
							    <a href="{{route('subcategory.delete',$item->id)}}"  class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

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
				  <h3 class="box-title">Add Sub Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method="POST" action="{{route('subcategory.store')}}" enctype="multipart/form-data">
            @csrf
					 
            <div class="form-group">
								<h5>Category Select<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" id="select" required class="form-control">
										<option value="" selected="" disabled="">Select Category</option>
										@foreach($categories as $item)
										<option value="{{$item->id}}">{{$item->category_name_en }}</option>
										@endforeach
										
									</select>
									@error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
								</div>
							</div>

							<h5>Sub  Category Select<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" id="select" required class="form-control">
										<option value="" selected="" disabled="">Select Sub Category</option>
										
									</select>
									@error('subcategory_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
								</div>
							</div>
							  <div class="form-group">
                            <h5>Sub -sub Category Name English<span class="text-danger"></span></h5>

                            <input type="text" name="subcategory_name_english" class="form-control" >
                              </div>
							  @error('subcategory_name_english')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
							  <div class="form-group">
                            <h5>Sub Category Name sinhala<span class="text-danger"></span></h5>

                            <input type="text" name="subcategory_name_sinhala" class="form-control">
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
  <script type="text/javascript">
      $(document).ready(function() { //runs when the page is loaded
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();

























			
            if(category_id) {
                $.ajax({
					url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>
  <!-- /.content-wrapper -->
 
  
	  @endsection