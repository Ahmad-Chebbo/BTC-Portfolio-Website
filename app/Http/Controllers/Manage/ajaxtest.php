<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Title;
use Session;
use App\ColorSetting;
// use DataTables;
use Yajra\Datatables\Datatables;

class TitleController extends Controller
{
    public function index()
    {
        $titles = Title::paginate(5);
        return view('manage.settings.title.index')->with('titles', $titles)->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);
        $title = Title::create([
            'title' => $request->title,
            ]);
        
        session()->flash('success', 'Title added successfully');
        return redirect()->back();
    }

    public function update(Request $request, Title $title)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);
        $title->title = $request->title;
        $title->save();

        session()->flash('warning', 'Title updated successfully');
        return redirect()->back();
    }

    public function destroy(Title $title)
    {
        $title->delete();
        session()->flash('error', 'Title deleted successfully');
        return redirect()->back();
    }

    public function enabled(Title $title)
    {
        $title->enabled = 1;
        $title->save();
        session()->flash('success', 'Title Link enabled successfully'); 
        return redirect()->back();

    } 
    public function disabled(Title $title)
    {
        $title->enabled = 0;
        $title->save();
        session()->flash('success', 'Title Link disabled successfully'); 
        return redirect()->back();
    }
}
