<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\SocialLink;
use Illuminate\Http\Request;
use Session;
use App\ColorSetting;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socials = SocialLink::paginate(5);
        return view('manage.social.index')->with('socials', $socials)->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);

        $socialLink = SocialLink::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'url' => $request->url,
            ]);
        session()->flash('success', 'Social Link added successfully'); 
        return redirect()->route('manage.social.index');
    }
    public function update(Request $request, SocialLink $social)
    {
        $this->validate($request,[
            'title' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);

        $social->title = $request->title;
        $social->icon = $request->icon;
        $social->url = $request->url;

        $social->save();
        session()->flash('warning', 'Social Link updated successfully'); 
        return redirect()->route('manage.social.index');
    }
    public function destroy(SocialLink $social)
    {
        $social->delete();
        session()->flash('error', 'Social Link deleted successfully'); 
        return redirect()->route('manage.social.index');
    }

    public function enabled(SocialLink $social)
    {
        $social->enabled = 1;
        $social->save();
        session()->flash('success', 'Social Link enabled successfully'); 
        return redirect()->back();

    } 
    public function disabled(SocialLink $social)
    {
        $social->enabled = 0;
        $social->save();
        session()->flash('success', 'Social Link disabled successfully'); 
        return redirect()->back();
    }
}
