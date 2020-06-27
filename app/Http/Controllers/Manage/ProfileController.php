<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use Auth;
use App\profile;
use App\ColorSetting;

class ProfileController extends Controller
{

    public function index()
    {
        return view('manage.user.profile')->with('user', Auth::user())->with('color',ColorSetting::first());
    }

    public function edit(profile $profile)
    {
        //
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email'=> 'required|email',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->about = $request->about;
        $user->profile->phone = $request->phone;
        $user->profile->DOB = $request->DOB;
        $user->profile->address = $request->address;
        $user->profile->street = $request->street;
            
        $user->profile->save();

            if($request->has('password')){
                $user->password = bcrypt($request->password);
            }

        $user->save();

        Session()->flash('success','Profile Updated!');
        return redirect()->back();
    }

}
