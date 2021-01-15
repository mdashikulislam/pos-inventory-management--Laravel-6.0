<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller implements ComponentCRUD
{
    public function index()
    {
        $category = Category::all();
        return view('backend.category.view')->with([
            'categories'=>$category
        ]);
    }
    public function add()
    {
        return view('backend.category.add');
    }
    public function store( Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:20','string','unique:categories']
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;
        $category->save();
        toast('Category create successfully','success');
        return redirect()->route('category.view');
    }
    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('backend.category.edit')->with([
            'category'=>$category
        ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:20','string']
        ]);
        $category = Category::findorfail($id);
        $category->name = $request->name;
        $category->updated_by = Auth::user()->id;
        $category->save();
        toast('Category update successfully','success');
        return redirect()->route('category.view');
    }

    public function delete($id)
    {
        $category = Category::findorfail($id);
        $category->delete($category);
        toast('Category Delete Successfully','success');
        return redirect()->route('category.view');
    }
}
