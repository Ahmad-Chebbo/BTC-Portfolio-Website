<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ColorSetting;
use App\SectionSetting;
use App\User;
use App\WSProject;
use App\SocialLink;
use App\Education;
use App\Experience;
use App\Skill;

class ManageController extends Controller
{

    public function dashboard(){

        return view('manage.dashboard')
        ->with('projects_count', WSProject::count())
        ->with('educations_count',Education::count())
        ->with('experiences_count',Experience::count())
        ->with('socials_count',SocialLink::count())
        ->with('skills',Skill::all())
        ->with('sections',SectionSetting::all())
        ->with('color',ColorSetting::first())
        ;
    }
}
