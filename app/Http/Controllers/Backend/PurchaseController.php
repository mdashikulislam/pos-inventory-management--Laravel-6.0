<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store( Request $request){
        if ($request->category_id == null){
            toast('Sorry! you do not select any item','error');
            return redirect()->back();
        }else{
            $countCategory = count($request->category_id);
            for ($i = 0; $i < $countCategory; $i++){
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d',strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->bying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->status = '0';
                $purchase->created_by = Auth::user()->id;
                $purchase->save();
            }
            toast('Data Saved successfully','success');
            return redirect()->route('purchase.view');
        }
    }
    public function edit($id){}
    public function update($id, Request $request){}
    public function delete($id){
        $purchase = Purchase::findorfail($id)->delete();
        toast('Data delete successfully...!!','success');
        return redirect()->back();
    }

    public function pendingPurchase()
    {
        $purchase = Purchase::orderBy('date','DESC')->orderBy('id','DESC')->where('status','=','0')->get();

        return view('backend.purchase.pending')
            ->with([
                'purchases'=>$purchase
            ]);
    }

    public function statusChange($id, Request $request)
    {
        $purchase = Purchase::where('id',$id)->first();
        $purchase->status = '1';
        $purchase->save();
        toast('Purchased Approve successfully','success');
        return redirect()->back();

    }
    public function approvePurchase()
    {
        $purchase = Purchase::orderBy('date','DESC')->orderBy('id','DESC')->where('status','=','1')->get();

        return view('backend.purchase.approve')
            ->with([
                'purchases'=>$purchase
            ]);
    }
}
