<?php


namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Certificate;
use App\ColorSetting;
use Session;

class CertificateController extends Controller
{
    
    public function index()
    {
        $certificates = Certificate::paginate(5);
        return view('manage.certificate.index')->with('certificates', $certificates)->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);

        $education = Certificate::create([
            'title' => $request->title,
            'description' => $request->description,
            'from' => $request->from,
            'to' => $request->to,
            ]);

        session()->flash('success', 'Certificate Added successfully');
        return redirect()->route('manage.certificate.index');
    }

    public function update(Request $request, Certificate $certificate)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);

        $certificate->title = $request->title;
        $certificate->description = $request->description;
        $certificate->from = $request->from;
        $certificate->to = $request->to;
            
        $certificate->save();
        session()->flash('warning', 'Certificate updated successfully');
        return redirect()->route('manage.certificate.index');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        session()->flash('error', 'Certificate deleted successfully');
        return redirect()->route('manage.certificate.index');
    }
}
