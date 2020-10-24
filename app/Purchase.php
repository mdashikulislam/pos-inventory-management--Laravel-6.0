<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';

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
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
