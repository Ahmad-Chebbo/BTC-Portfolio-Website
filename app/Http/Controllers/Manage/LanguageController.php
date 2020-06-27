<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Language;
use App\ColorSetting;

class LanguageController extends Controller
{

    public function index()
    {
        $languages = Language::paginate(5);
        return view('manage.language.index')->with('languages', $languages)->with('color',ColorSetting::first());
    }

    public function create()
    {
        return view('manage.language.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'level' => 'required',
        ]);

        $language = Language::create([
            'name' => $request->name,
            'level' => $request->level,
            ]);
        session()->flash('success', 'Language added successfully');
        return redirect()->route('manage.language.index');
    }

    public function update(Request $request, Language $language)
    {
        $this->validate($request,[
            'name' => 'required',
            'level' => 'required',
        ]);


        $language->name = $request->name;
        $language->level = $request->level;

        $language->save();
        session()->flash('warning', 'Language updated successfully');
        return redirect()->route('manage.language.index');
    }

    public function destroy(Language $language)
    {
        $language->delete();
        session()->flash('error', 'Language deleted successfully');
        return redirect()->route('manage.language.index');
    }
}
