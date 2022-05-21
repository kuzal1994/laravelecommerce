<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Subcategory;
use App\Models\category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function allsubcategoryview(){
        $caegoriets=category::orderBy('category_name_en','ASC')->get();
        $adminData=Admin::find(1);
        $subcategory=Subcategory::latest()->get();
 return view('backend.category.subcategory_view',compact('subcategory',  'adminData','caegoriets'));
    }
    public function subcategorystore(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name_sinhala'=>'required',
            'subcategory_name_english'=>'required',
                   
                   ]);
                   Subcategory::insert([
                    'category_id'=>$request->category_id,
                    'subcategory_name_en'=>$request->subcategory_name_english,
                    'subcategory_name_sinhala' =>$request->subcategory_name_sinhala,	
                    'subcategory_slag_en'=>strtolower(str_replace('.','-',$request->subcategory_name_english)),
                    'subcategory_slag_sinhala'=>strtolower(str_replace('','-',$request->subcategory_name_sinhala)),
                ]);  
                return redirect()->back();     

    }
    public function subcategoryedit($id){
        $caegoriets=category::orderBy('category_name_en','ASC')->get();
        $subcategory=Subcategory::find($id);
        $adminData=Admin::find(1);
        return view('backend.category.subcategory_edit',compact('caegoriets','subcategory','adminData'));
    }
    
}
