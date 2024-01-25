<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function category() 
    {
        // This the Relation with Category Model.
        return $this->belongsTo(Category::class,'category_id','id')->select('id','name');
    }

    public function subcategory() 
    {
        // This the Relation with SubCategory Model.
        return $this->belongsTo(SubCategory::class,'subcategory_id','id')->select('id','name');
    }
}
