<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ColorSetting;

class ColorSettingController extends Controller
{
    
    public function index()
    {
        $color = ColorSetting::first();
        return view('manage.settings.color.index')->with('color', $color);
    }

    public function update(Request $request)
    {
        $color = ColorSetting::first();
        $this->validate($request,[
            'primary' => 'required',
            'secondary' => 'required',
            'footer' => 'required',
        ]);

        $color->primary = $request->primary;
        $color->secondary = $request->secondary;
        $color->footer = $request->footer;
        $color->save();
        session()->flash('success', 'Website Colors updated successfully');
        return redirect()->route('manage.settings.color.index');
    }
}
