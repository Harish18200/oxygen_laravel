<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMain extends Model
{
    use HasFactory;
    protected $table = 'category_main';
    protected $primaryKey = 'id';
    protected $fillable = ["category_main_name", "category_main_image", "status", 'flag', "created_by"];


    public function submenu(){
       // $sub = ('App\Models\Category\Category', 'main_category_id', 'id');
        
        return $this->hasMany('App\Models\Category\Category', 'main_category_id', 'id');
          
    }


}


