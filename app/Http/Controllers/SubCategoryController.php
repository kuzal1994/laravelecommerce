<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function allsubcategoryview(){
        $adminData=Admin::find(1);
        $subcategory=Subcategory::latest()->get();
 return view('backend.category.subcategory_view',compact('subcategory',  'adminData'));
    }
    public function allsubcategoryview(){
        $adminData=Admin::find(1);
        $subcategory=Subcategory::latest()->get();
 return view('backend.category.subcategory_view',compact('subcategory',  'adminData'));
    }
}
