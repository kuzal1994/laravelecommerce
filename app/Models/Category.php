<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name_en',
        'category_name_sinhala',
        'category_slag_en',
        'category_slag_sinhala',
        'category_icon'
     
    ];
}
