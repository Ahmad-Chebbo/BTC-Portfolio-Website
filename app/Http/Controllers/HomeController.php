<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ColorSetting;
use App\MediaSetting;
use App\SectionSetting;
use App\profile;
use App\User;
use App\WSCategory;
use App\WSProject;
use App\SocialLink;
use App\Certificate;
use App\Education;
use App\Experience;
use App\Language;
use App\Skill;
use App\Title;
use App\Counter;


class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $color = ColorSetting::first();
        $media = MediaSetting::first();
        $user = User::first();
        $sections = SectionSetting::all();
        $counters = Counter::all();
        $titles = Title::where('enabled',true)->get();
        $categories = WSCategory::all();
        $projects = WSProject::all();
        $certificates = Certificate::all();
        $educations = Education::all();
        $experiences = Experience::all();
        $languages = Language::all();
        $skills = Skill::all();
        $socials = SocialLink::where('enabled', true)->get();     

        return view('welcome')
        ->with('color',$color)
        ->with('sections',$sections)
        ->with('counters',$counters)
        ->with('titles',$titles)
        ->with('media',$media)
        ->with('categories',$categories)
        ->with('projects',$projects)
        ->with('socials',$socials)
        ->with('certificates',$certificates)
        ->with('educations',$educations)
        ->with('experiences',$experiences)
        ->with('languages',$languages)
        ->with('skills',$skills)
        ->with('user', $user);
    }


    public function singleProject($id) {

        $project = WSProject::where('id', $id)->first();
        $next_id = WSProject::where('id', '>', $project->id)->min('id');
        $prev_id = WSProject::where('id', '<', $project->id)->max('id');

        return view('single')
        ->with('project', $project)
        ->with('sections', SectionSetting::all())
        ->with('media', MediaSetting::first())
        ->with('color', ColorSetting::first())
        ->with('counters', Counter::all())
        ->with('socials', SocialLink::where('enabled', true)->get())
        ->with('titles', Title::where('enabled',true)->get())
        ->with('user', User::first())
        ->with('next',WSProject::find($next_id))
        ->with('prev',WSProject::find($prev_id));
        
    }
}
