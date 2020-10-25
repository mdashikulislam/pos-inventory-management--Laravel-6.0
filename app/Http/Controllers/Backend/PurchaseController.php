<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchase = Purchase::orderBy('date','DESC')->orderBy('id','DESC')->get();

        return view('backend.purchase.view')
            ->with([
                'purchases'=>$purchase
            ]);
    }
    public function add(){
        return view('backend.purchase.add')
            ->with([
                'suppliers'=>Supplier::all(),
                'units'=>Unit::all(),
                'categories'=>Category::all(),
                'products'=>Product::all()
            ]);
    }
    public function store( Request $request){}
    public function edit($id){}
    public function update($id, Request $request){}
    public function delete($id){}


}
