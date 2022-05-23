<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Admin;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    public function categoryview(){
        $adminData=Admin::find(1);
        $category=Category::latest()->get();
 return view('backend.category.category_view',compact('category',  'adminData'));
    }
    public function categorystore(Request $request){
        $request->validate([
            'category_name_en'=>'required',
            'category_name_sinhala'=>'required',
            'category_icon'=>'required',
                   ],[
           'category_name_en.required'=>'Input category English Name',
           'category_name_sinhala.required'=>'Input category sinhala name',      
                   ]);
           
                 
                   Category::insert([
              'category_name_en'=>$request->category_name_en,
              'category_name_sinhala'=>$request->category_name_sinhala,
              'category_slag_en'=>strtolower(str_replace('.','-',$request->category_name_en)),
              'category_slag_sinhala'=>strtolower(str_replace('','-',$request->category_name_sinhala)),
              'category_icon'=>$request->category_icon,
            
               
    ]);
    $notification = array(
        'message' => 'Brand Inserted Successfully',
        'alert-type' => 'success'
    );
              return redirect()->back()->with($notification);
    }
    public function categoryedit($id){
        $category=Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }
    public function categoryupdate(Request $request){
$category=$request->id;
$request->validate([
    'category_name_en'=>'required',
    'category_name_sinhala'=>'required',
    'category_icon'=>'required',
           ],[
   'category_name_en.required'=>'Input category English Name',
   'category_name_sinhala.required'=>'Input category sinhala name',      
           ]);
   
         
           Category::find($category)->update([
      'category_name_en'=>$request->category_name_en,
      'category_name_sinhala'=>$request->category_name_sinhala,
      'category_slag_en'=>strtolower(str_replace('.','-',$request->category_name_en)),
      'category_slag_sinhala'=>strtolower(str_replace('','-',$request->category_name_sinhala)),
      'category_icon'=>$request->category_icon,
    
       
]);
      return redirect()->route('all.category');

    }
    public function categorydelete($id){
        $category=Category::find($id)->delete();
        return redirect()->route('all.category');
    }
}
