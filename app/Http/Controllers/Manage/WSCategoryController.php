<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WSCategory;
use Session;
use App\ColorSetting;

class WSCategoryController extends Controller
{

    public function index()
    {
        $wscategories = WSCategory::paginate(5);
        return view('manage.wscategory.index')->with('wscategories', $wscategories)->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        

        $wscategory = WSCategory::create([
            'name' => $request->name,
            ]);
        
        session()->flash('success', 'Category added successfully');
        return redirect()->back();
    }
    public function update(Request $request, WSCategory $wscategory)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $wscategory->name = $request->name;
        $wscategory->save();

        session()->flash('warning', 'Category updated successfully');
        return redirect()->back();
    }
    public function destroy(WSCategory $wscategory)
    {
        $wscategory->delete();

        session()->flash('error', 'Category deleted successfully');
        return redirect()->back();
    }
}
