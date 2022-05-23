<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Brand;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
{
  
    public function brandview(){
        $adminData=Admin::find(1);
        $brands=Brand::latest()->get();
 return view('backend.brand.brand_view',compact('brands',  'adminData'));
    }

    public function brandstore(Request $request){
        $request->validate([
 'brand_name_en'=>'required',
 'brand_name_sinhala'=>'required',
 'brand_image'=>'required',
        ],[
'brand_name_en.required'=>'Input Brand English Name',
'brand_name_sinhala.required'=>'Input brand sinhala name',      
        ]);

        $image=$request->file('brand_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url='upload/brand/'.$name_gen;
        Brand::insert([
   'brand_name_en'=>$request->brand_name_en,
   'brand_name_sinhala'=>$request->brand_name_sinhala,
   'brand_slug_en'=>strtolower(str_replace('.','-',$request->brand_name_en)),
   'brand_slug_sinhala'=>strtolower(str_replace('','-',$request->brand_name_sinhala)),
   'brand_image'=>$save_url,
]);
   $notification=array(
    'message'=>'Product Added Successfully',
    'alert-type'=>'success',
    
    
   );
   return redirect()->back()->with($notification);
        
    }
    public function brandedit($id){
        $brand=Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));
    }
    public function brandupdate(Request $request){
        $brand_id=$request->id;
        $old_image=$request->old_image;
        $request->validate([
            'brand_name_en'=>'required',
            'brand_name_sinhala'=>'required',
          
                   ],[
           'brand_name_en.required'=>'Input Brand English Name',
           'brand_name_sinhala.required'=>'Input brand sinhala name',      
                   ]);
        if($request->file('brand_image')){
        
                       unlink($old_image);
                       $image=$request->file('brand_image');
                       $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                       Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
                       $save_url='upload/brand/'.$name_gen;

                       Brand::find($brand_id)->update([
                  'brand_name_en'=>$request->brand_name_en,
                  'brand_name_sinhala'=>$request->brand_name_sinhala,
                  'brand_slug_en'=>strtolower(str_replace('.','-',$request->brand_name_en)),
                  'brand_slug_sinhala'=>strtolower(str_replace('','-',$request->brand_name_sinhala)),
                  'brand_image'=>$save_url,
               ]);
                  
                       

        }else{
            Brand::find($brand_id)->update([
                'brand_name_en'=>$request->brand_name_en,
                'brand_name_sinhala'=>$request->brand_name_sinhala,
                'brand_slug_en'=>strtolower(str_replace('.','-',$request->brand_name_en)),
                'brand_slug_sinhala'=>strtolower(str_replace('','-',$request->brand_name_sinhala)),
            ]);
            $notification=array(
                'message'=>'Product updated Successfully',
                'alert-type'=>'info',
                
                
               );
            return redirect()->route('all.brand')->with($notification);
        }
    }
    public function branddelete($id){
        $brand=Brand::findOrFail($id);
        $image=$brand->brand_image;
        unlink($image);
        Brand::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Product deleted Successfully',
            'alert-type'=>'info',
            
            
           );
        return redirect()->back()->with($notification);

    }
}
