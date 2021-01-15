<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller implements ComponentCRUD
{
    public function index()
    {
        $unit = Unit::all();
        return view('backend.unit.view')->with([
            'units'=>$unit
        ]);
    }
    public function add()
    {
        return view('backend.unit.add');
    }
    public function store( Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:20','string','unique:units']
        ]);
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->created_by = Auth::user()->id;
        $unit->save();
        toast('Unit create successfully','success');
        return redirect()->route('unit.view');
    }
    public function edit($id)
    {
        $unit = Unit::findorfail($id);
        return view('backend.unit.edit')->with([
            'unit'=>$unit
        ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:20','string']
        ]);
        $unit = Unit::findorfail($id);
        $unit->name = $request->name;
        $unit->updated_by = Auth::user()->id;
        $unit->save();
        toast('Unit update successfully','success');
        return redirect()->route('unit.view');
    }

    public function delete($id)
    {
        $unit = Unit::findorfail($id);
        $unit->delete($unit);
        toast('Unit Delete Successfully','success');
        return redirect()->route('unit.view');
    }
}
