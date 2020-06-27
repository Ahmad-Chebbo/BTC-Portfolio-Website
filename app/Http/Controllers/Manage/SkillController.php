<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Skill;
use Session;
use App\ColorSetting;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::paginate(5);
        return view('manage.skill.index')->with('skills', $skills)->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'skill' => 'required',
            'percent' => 'required|integer',
        ]);

        $skill = Skill::create([
            'skill' => $request->skill,
            'percent' => $request->percent,
            ]);
        session()->flash('success', 'Skill added successfully'); 
        return redirect()->back();
    }

    public function update(Request $request, Skill $skill)
    {
        $this->validate($request,[
            'skill' => 'required',
            'percent' => 'required|integer',
        ]);
        $skill->skill = $request->skill;
        $skill->percent = $request->percent;

        $skill->save();
        session()->flash('warning', 'Skill updated successfully'); 
        return redirect()->back();
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        session()->flash('error', 'Skill deleted successfully');
        return redirect()->route('manage.skill.index');
    }
}
