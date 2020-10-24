<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchase = Purchase::orderBy('date','DESC')->orderBy('id','DESC')->get();
        dd($purchase);
        return view('backend.purchase.view')
            ->with([
                'purchase'=>$purchase
            ]);
    }
    public function add(){}
    public function store( Request $request){}
    public function edit($id){}
    public function update($id, Request $request){}
    public function delete($id){}
}
