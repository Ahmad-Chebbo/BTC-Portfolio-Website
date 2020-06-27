<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Education;
use App\ColorSetting;

class EducationController extends Controller
{

    public function index()
    {
        $educations = Education::latest()->paginate(5);
        return view('manage.education.index')->with('educations', $educations)->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'place_name'=> 'required',
            'desc' => 'required',
            'to' => 'required',
        ]);

        $education = Education::create([
            'title' => $request->title,
            'place_name' => $request->place_name,
            'desc' => $request->desc,
            'from' => $request->from,
            'to' => $request->to,
            ]);
        session()->flash('success', 'Education added successfully');
        return redirect()->route('manage.education.index');
    }

    public function update(Request $request, Education $education)
    {
        $this->validate($request,[
            'title' => 'required',
            'place_name'=> 'required',
            'desc' => 'required',
        ]);


        $education->title = $request->title;
        $education->place_name = $request->place_name;
        $education->desc = $request->desc;
        $education->from = $request->from;
        $education->to = $request->to;
            
        $education->save();
        Session()->flash('warning','Education Updated!');
        return redirect()->route('manage.education.index');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        session()->flash('error', 'Education deleted successfully');

        return redirect()->route('manage.education.index');
    }
}
