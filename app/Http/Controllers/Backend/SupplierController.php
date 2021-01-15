<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller implements ComponentCRUD
{

    public function index()
    {
        $supplier = Supplier::all();
        return view('backend.supplier.view')->with([
            'suppliers'=>$supplier
        ]);
    }

    public function add()
    {
        return view('backend.supplier.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:suppliers'],
            'mobile'=>['required','max:14','min:11',],
            'address'=>['required','string','max:255','min:15']
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile = $request->mobile;
        $supplier->address = $request->address;
        $supplier->created_by = Auth::user()->id;
        $supplier->save();
        toast('Supplier Added Successfully','success');
        return redirect()->route('supplier.view');
    }

    public function edit($id)
    {
        $supplier = Supplier::where('id',$id)->first();
        return view('backend.supplier.edit')->with([
            'supplier'=>$supplier
        ]);
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:suppliers'],
            'mobile'=>['required','max:14','min:11',],
            'address'=>['required','string','max:255','min:15']
        ]);
        $supplier = Supplier::where('id',$id)->first();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile = $request->mobile;
        $supplier->address = $request->address;
        $supplier->updated_by = Auth::user()->id;
        $supplier->save();
        toast('Supplier Update Successfully','success');
        return redirect()->route('supplier.view');
    }

    public function delete($id)
    {
        $supplier = Supplier::findorfail($id);
        $supplier->delete($supplier);
        toast('Supplier Delete Successfully','success');
        return redirect()->route('supplier.view');
    }
}
