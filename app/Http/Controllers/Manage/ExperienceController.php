<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Experience;
use App\ColorSetting;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->paginate(5);
        return view('manage.experience.index')->with('experiences', $experiences)->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description'=> 'required',
            'place'=>'required',
        ]);

        $experience = Experience::create([
            'title' => $request->title,
            'description' => $request->description,
            'place' => $request->place,
            'from' => $request->from,
            'to' => $request->to,
            ]);
        session()->flash('success', 'Experience added successfully');
        return redirect()->route('manage.experience.index');
    }

    public function update(Request $request, Experience $experience)
    {
        $this->validate($request,[
            'title' => 'required',
            'description'=> 'required',
            'place'=>'required',
        ]);


        $experience->title = $request->title;
        $experience->description = $request->description;
        $experience->place = $request->place;
        $experience->from = $request->from;
        $experience->to = $request->to;
            
        $experience->save();
        session()->flash('warning', 'Experience updated successfully');
        return redirect()->route('manage.experience.index');
    }
    public function destroy(Experience $experience)
    {
        $experience->delete();
        session()->flash('error', 'Experience deleted successfully');
        return redirect()->route('manage.experience.index');
    }
}
