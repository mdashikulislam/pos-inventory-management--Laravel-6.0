<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getSupplier(Request $request)
    {
        $categoryId =  Product::with(['categories'])->select('category_id')
            ->where('supplier_id',$request->supplier_id)
            ->groupBy('category_id')
            ->get();
        return response()->json($categoryId);
    }
    public function getCategory(Request  $request)
    {
       return response()->json(Product::where('category_id',$request->category_id)->get());
    }
}
