<?php

namespace App\Http\Controllers\Backend;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller implements ComponentCRUD
{
    public function index()
    {
        $customer = Customer::all();
        return view('backend.customer.view')->with([
            'customers'=>$customer
        ]);
   }

    public function add()
    {
        return view('backend.customer.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'mobile'=>['required','max:14','min:11',],
            'address'=>['required','string','max:255','min:15']
        ]);

        $supplier = new Customer();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile = $request->mobile;
        $supplier->address = $request->address;
        $supplier->created_by = Auth::user()->id;
        $supplier->save();
        toast('Customer Added Successfully','success');
        return redirect()->route('customer.view');

    }

    public function edit($id)
    {
        $customer = Customer::findorfail($id);
       return view('backend.customer.edit')->with([
           'customer'=> $customer
       ]);
    }

    public function update($id, Request $request)
    {
        $customer = Customer::findorfail($id);
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:suppliers'],
            'mobile'=>['required','max:14','min:11',],
            'address'=>['required','string','max:255','min:15']
        ]);
        $supplier = Customer::where('id',$id)->first();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile = $request->mobile;
        $supplier->address = $request->address;
        $supplier->updated_by = Auth::user()->id;
        $supplier->save();
        toast('Customer Update Successfully','success');
        return redirect()->route('customer.view');
    }

    public function delete($id)
    {
        $customer = Customer::findorfail($id);
        $customer->delete($customer);
        toast('Customer Delete Successfully','success');
        return redirect()->route('customer.view');
    }
}
