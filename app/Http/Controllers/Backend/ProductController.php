<?php

namespace App\Http\Controllers\Backend;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('backend.product.view')->with([
            'products'=>$product
        ]);
    }

    public function add()
    {
        $suppliers = Supplier::all();
        $unit = Unit::all();
        $categories = Category::all();
        return view('backend.product.add')->with([
            'suppliers'=>$suppliers,
            'units'=>$unit,
            'categories'=>$categories
        ]);
    }
    public function store( Request $request)
    {
        $product = new Product();
        $product->supplier_id	= $request->supplier;
        $product->unit_id	= $request->unit;
        $product->category_id	= $request->category;
        $product->name	= $request->name;
        $product->quantity	= '0';
        $product->created_by	= Auth::user()->id;
        $product->save();
        toast('Product Create Successfully','success');
        return redirect()->route('product.view');
    }
    public function edit($id)
    {
        $product = Product::findorfail($id);
        $suppliers = Supplier::all();
        $unit = Unit::all();
        $categories = Category::all();
        return view('backend.product.edit')->with([
            'product'=>$product,
            'suppliers'=>$suppliers,
            'units'=>$unit,
            'categories'=>$categories
        ]);
    }

    public function update($id, Request $request)
    {
        $product = Product::findorfail($id);
        $product->supplier_id	= $request->supplier;
        $product->unit_id	= $request->unit;
        $product->category_id	= $request->category;
        $product->name	= $request->name;
        $product->quantity	= '0';
        $product->updated_by= Auth::user()->id;
        $product->save();
        toast('Product Update Successfully','success');
        return redirect()->route('product.view');
    }
    public function delete($id)
    {
        $product = Product::findorfail($id);
        $product->delete($product);
        toast('Product Delete Successfully','success');
        return redirect()->route('product.view');
    }
}
