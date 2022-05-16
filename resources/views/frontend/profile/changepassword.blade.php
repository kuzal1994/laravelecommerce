@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
        <img class="card-img-top" style="border-radius:50%" src="{{
          (!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" width ="100%" height="100%"><br><br>
           <ul class="list-group list-group-flush">

           <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
           <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
           <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
           <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
           </ul>
    
    </div> <!--end col md 2-->

            <div class="col-md-2">

            </div> <!--end col md 2-->

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{
                        Auth::user()->name}}</strong> Update your password</h3>
                        <div class="card-body">
                            <form method="post" action="{{route('user.password.update')}}" enctype="multipart/form-data">
                           @csrf
                            <div class="form-group">
                            <h5>Current Password <span class="text-danger">*</span></h5>

                            <input type="password" name="oldpassword" class="form-control" required="">
                              </div>
                            
                              <div class="form-group">
                            <h5>New Password <span class="text-danger">*</span></h5>

                            <input type="password" name="password" class="form-control" required="">
                              </div>

                              <div class="form-group">
                            <h5>Confirm new password<span class="text-danger">*</span></h5>
                            
                              
                            <input type="password" name="password_confirmation" class="form-control" required="">
                              </div>

                              @error('password')
                                 <span class="text-danger">{{$message}}</span>
                                  @enderror
                         
                            <button type="submit" class="btn btn-danger">Change password</button>
                            </form>
                        </div>
                </div>

          </div> <!--end col md 6-->
        </div> <!--end row-->
    </div>
</div>



@endsection