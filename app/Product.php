<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function suppliers(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function units()
    {
        return $this->belongsTo(Unit::class,'unit_id','id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
