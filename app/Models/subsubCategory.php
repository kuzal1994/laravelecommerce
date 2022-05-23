<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsubCategory extends Model
{
    protected $fillable = [
        'sub_subcategory_name_en',
        'sub_subcategory_name_sinhala',
        'sub_subcategory_slag_en',
        'sub_subcategory_slag_sinhala',
        'category_id',
        'sub_category_id',
     
     
    ];
    public function catgory(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcatgory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
    use HasFactory;
}
