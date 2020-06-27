<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Counter;
use Session;
use App\ColorSetting;

class counterController extends Controller
{

    public function index()
    {
        $counters = Counter::paginate(5);
        return view('manage.counter.index')->with('counters', $counters)->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'header' => 'required',
            'icon' => 'required',
            'number' => 'required',
        ]);

        

        $counter = Counter::create([
            'header' => $request->header,
            'icon' => $request->icon,
            'number' => $request->number,

            ]);
        
        session()->flash('success', 'Counter added successfully');
        return redirect()->back();
    }

    public function update(Request $request, Counter $counter)
    {
        $this->validate($request,[
            'header' => 'required',
            'icon' => 'required',
            'number' => 'required',
        ]);
        $counter->header = $request->header;
        $counter->icon = $request->icon;
        $counter->number = $request->number;

        $counter->save();

        session()->flash('warning', 'Counter updated successfully');
        return redirect()->back();
    }

    public function destroy(Counter $counter)
    {
        $counter->delete();

        session()->flash('error', 'Counter deleted successfully');
        return redirect()->back();
    }

    // public function enabled(Counter $counter)
    // {
    //     $counter->enabled = 1;
    //     $counter->save();
    //     session()->flash('success', 'Counter Link enabled successfully'); 
    //     return redirect()->back();

    // } 
    // public function disabled(Counter $counter)
    // {
    //     $counter->enabled = 0;
    //     $counter->save();
    //     session()->flash('success', 'counter Link disabled successfully'); 
    //     return redirect()->back();
    // }
}
