<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SectionSetting;
use App\ColorSetting;

class SectionSettingController extends Controller
{
    
    public function index()
    {
        $sections = SectionSetting::paginate(6);
        return view('manage.settings.section.index')->with('sections', $sections)->with('color',ColorSetting::first());
    }

    public function update(Request $request, SectionSetting $section)
    {
        $this->validate($request,[
            'header' => 'required',
            'subtitle' => 'required',
        ]);

        $section->section = $request->section;
        $section->header = $request->header;
        $section->subtitle = $request->subtitle;
        $section->save();
        session()->flash('success', 'Website Sections updated successfully');
        return redirect()->back();
    }

    public function enabled(SectionSetting $section)
    {
        $section->enabled = 1;
        $section->save();
        session()->flash('success', 'Website Sections enabled successfully'); 
        return redirect()->back();

    } 
    public function disabled(SectionSetting $section)
    {
        $section->enabled = 0;
        $section->save();
        session()->flash('success', 'Website Sections disabled successfully'); 
        return redirect()->back();
    }

}
