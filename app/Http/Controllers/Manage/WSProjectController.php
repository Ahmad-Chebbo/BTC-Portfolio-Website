<?php
namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WSProject;
use App\WSCategory;
use Session;
use File;
use App\ColorSetting;

class WSProjectController extends Controller
{

    public function index()
    {
        $wscategories = WSCategory::all();
        $wsprojects = WSProject::paginate(5);
        return view('manage.wsproject.index')->with('wsprojects', $wsprojects)->with('wscategories',$wscategories)->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        $wscategories = WSCategory::all();

        if($wscategories->count() == 0)
        {
            session()->flash('error', 'please add category'); 
        }
        else{
            $this->validate($request,[
                'title' => 'required|unique:w_s_projects',
                'image' => 'required|image',
                'description' => 'required',
                'category_id'=> 'required',
            ]);

            $image = $request->image;
            $image_new = time().'-'.$image->getClientoriginalName();
            $image->move('uploads/projects', $image_new);

            $wsproject = WSProject::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => '/uploads/projects/'. $image_new,
                'category_id' => $request->category_id,
                'from' => $request->from,
                'to' => $request->to,
                'url' => $request->url,
                ]);
        }
        session()->flash('success', 'Project added successfully'); 
        return redirect()->back();
    }

    
    public function update(Request $request, WSProject $wsproject)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'category_id'=> 'required',
        ]);

        if($request->hasfile('image')){
            $this->validate($request,['image' => 'image']);
            $old_image = './' .$wsproject->image;
            if(File::exists($old_image)){
                unlink('./' .$old_image);
            }

            $image = $request->image;
            $image_new = time().'-'.$image->getClientoriginalName();
            $image->move('uploads/projects', $image_new);
            $wsproject->image ='/uploads/projects/'.$image_new;
        }

        $wsproject->title = $request->title;
        $wsproject->description = $request->description;
        $wsproject->category_id = $request->category_id;
        $wsproject->from = $request->from;
        $wsproject->to = $request->to;
        $wsproject->url = $request->url;
        $wsproject->save();
        session()->flash('warning', 'Project updated successfully'); 
        return redirect()->back();
    }

    public function destroy(WSProject $wsproject)
    {
        $image = $wsproject->image;

        unlink('./'.$image);
        $wsproject->delete();
        session()->flash('success', 'Project deleted successfully'); 
        return redirect()->back();
    }
}
