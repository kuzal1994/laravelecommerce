<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcategory_name_en',
        'subcategory_name_sinhala',
        'subcategory_slag_en',
        'subcategory_slag_sinhala',
        'category_id',
     
     
    ];
    public function catgory(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
}
