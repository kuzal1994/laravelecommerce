<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
   public function login(){
       return view('auth.login');
   }
   public function forgetpassword(){
       return view('auth.forgot-password');
   }
   public function logout(){
       Auth::logout();
       return redirect()->route('user.login');
   }
   public function userprofile(){
       $id=Auth::user()->id;
       $user=User::find($id);
       return view('frontend.profile.user_profile',compact('user'));
   }

   public function userprofileupdate(Request $request){

    $data=User::find(Auth::user()->id);
    $data->name=$request->name;
    $data->email=$request->email;
    $data->phone_number=$request->phone;


    if($request->file('profile_photo_path')){
        $file=$request->file('profile_photo_path');
        @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/user_images'),$filename);
        $data['profile_photo_path']=$filename;
      }
    $data->save();

    $notification=array(
        'message'=>'User profile updated Successfully',
        'alert-type'=>'success',
    );
    return redirect()->route('dashboard')->with($notification);
  }
  public function userchangepassword(){
    $id=Auth::user()->id;
    $user=User::find($id);
      return view('frontend.profile.changepassword',compact('user'));
  }

  public function userchangepasswordupdate(Request $request){
    $validateData=$request->validate([
        'oldpassword'=>'required',
        'password'=>'required|confirmed',
        
      ]);

      $id=Auth::user()->id;
      $user=User::find($id);

      $notification=array(
        'message'=>'password changes succesfully,please login again',
        'alert-type'=>'success',
        'error'=>'please type old password correctly',
        'alert-type'=>'error',
        
    );

     
    
      
      $hashedpassword=User::find($id)->password;
      if(Hash::check($request->oldpassword, $hashedpassword)){
        $user=User::find($id);
        $user->password=Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect()->route('user.logout');
      }else{
        return redirect()->route('user.change.password')->with($notification);
      }



  }
   }

