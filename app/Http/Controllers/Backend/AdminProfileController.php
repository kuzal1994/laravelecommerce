<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdminProfileController extends Controller
{
    public function Adminprofile(){
      $adminData=Admin::find(1);
      return view('admin.admin_profile',compact('adminData'));
    }
    public function Adminprofileedit(){
      $editadminData=Admin::find(1);
      return view('admin.admin_profile_edit',compact('editadminData'));
    }
    public function Adminprofileupdate(Request $request){
      $data=Admin::find(1);
      $data->name=$request->name;
      $data->email=$request->email;

      if($request->file('profile_photo_path')){
        $file=$request->file('profile_photo_path');
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['profile_photo_path']=$filename;
      }
      $data->save();
      return redirect()->route('admin.profile');
    }

    public function Adminchangepassword(){
      return view('admin.admin_changepassword');
    }

    public function Adminupdatepassword(Request $request){
      $validateData=$request->validate([
        'oldpassword'=>'required',
        'password'=>'required|confirmed',

      ]);

      $hashedpassword=Admin::find(1)->password;
      if(Hash::check($request->oldpassword, $hashedpassword)){
        $admin=Admin::find(1);
        $admin->password=Hash::make($request->password);
        $admin->save();
        Auth::logout();
        return redirect()->route('admin.logout');
      }else{
        return redirect()->back();
      }

    }
}
