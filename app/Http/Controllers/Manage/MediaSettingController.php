<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\MediaSetting;
use Storage;
use Session;
use File;
use App\ColorSetting;

class MediaSettingController extends Controller
{
    
    public function index()
    {
        $media = MediaSetting::first();
        return view('manage.settings.media.index')->with('media', $media)->with('color',ColorSetting::first());
    }

    public function update(Request $request)
    {
        $media = MediaSetting::first();

        // $media_array[] = ['profile','background','counter','cv'];

        // foreach ($media_array as $value) {
        //     if($request->hasfile($value)){
        //         $old = '$' . $value . '_old';
        //         dd($old);
        //         $old = './' .$media->profile;
        //         if(File::exists($old)){
        //             unlink('./' .$old);
        //         }
        //         $value2 = $request->$value;
        //         $value_new = time().'-'.$value2->getClientoriginalName();
        //         $value2->move('uploads/media', $value_new);
        //         $media->$value ='/uploads/media/'.$value_new;
        //     }
        // }


        // if($request->hasfile('profile')){
        //     $path = Storage::disk('local')->getAdapter()->applyPathPrefix($media->profile);
        //     if(Str::contains($path,'default-imgs')){
        //         dd($path);
        //     }
        //     else{
        //         dd('No');
        //     }
            
        // }   
        
        
        if($request->hasfile('profile')){
            $this->validate($request,['profile' => 'image']);
            $profile_old = './' .$media->profile;
            if(File::exists($profile_old)){
                $path = Storage::disk('local')->getAdapter()->applyPathPrefix($media->profile);
                if(Str::contains($path,'default-imgs')){
                    
                }
                else{
                    unlink('./' .$profile_old);
                }
            }
            $profile = $request->profile;
            $profile_new = time().'-'.$profile->getClientoriginalName();
            $profile->move('uploads/media', $profile_new);
            $media->profile ='/uploads/media/'.$profile_new;
        }
        if($request->hasfile('background')){
            $this->validate($request,['background' => 'image']);
            $background_old = './' .$media->background;
            if(File::exists($background_old)){
                $path = Storage::disk('local')->getAdapter()->applyPathPrefix($media->background);
                if(Str::contains($path,'default-imgs')){
                    
                }
                else{
                    unlink('./' .$background_old);
                }
            }
            $background = $request->background;
            $background_new = time().'-'.$background->getClientoriginalName();
            $background->move('uploads/media', $background_new);
            $media->background ='/uploads/media/'.$background_new;
        }
        if($request->hasfile('counter')){
            $this->validate($request,['counter' => 'image']);
            $counter_old = './' .$media->counter;
            if(File::exists($counter_old)){
                $path = Storage::disk('local')->getAdapter()->applyPathPrefix($media->counter);
                if(Str::contains($path,'default-imgs')){
                    
                }
                else{
                    unlink('./' .$counter_old);
                }
            }
            $counter = $request->counter;
            $counter_new = time().'-'.$counter->getClientoriginalName();
            $counter->move('uploads/media', $counter_new);
            $media->counter ='/uploads/media/'.$counter_new;
        }
        if($request->hasfile('quote')){
            $this->validate($request,['quote' => 'image']);
            $quote_old = './' .$media->quote;
            if(File::exists($quote_old)){
                $path = Storage::disk('local')->getAdapter()->applyPathPrefix($media->quote);
                if(Str::contains($path,'default-imgs')){
                    
                }
                else{
                    unlink('./' .$quote_old);
                }
            }
            $quote = $request->quote;
            $quote_new = time().'-'.$quote->getClientoriginalName();
            $quote->move('uploads/media', $quote_new);
            $media->quote ='/uploads/media/'.$quote_new;
        }
        if($request->hasfile('favicon')){
            $this->validate($request,['favicon' => 'image']);
            $favicon_old = './' .$media->favicon;
            if(File::exists($favicon_old)){
                $path = Storage::disk('local')->getAdapter()->applyPathPrefix($media->favicon);
                if(Str::contains($path,'default-imgs')){
                    
                }
                else{
                    unlink('./' .$favicon_old);
                }
            }
            $favicon = $request->favicon;
            $favicon_new = time().'-'.$favicon->getClientoriginalName();
            $favicon->move('uploads/media', $favicon_new);
            $media->favicon ='/uploads/media/'.$favicon_new;
        }
        if($request->hasfile('cv')){
            $this->validate($request,['cv' => 'mimes:docx,doc,pdf,zip']);
            $cv_old = './' .$media->cv;
            if(File::exists($cv_old)){
                $path = Storage::disk('local')->getAdapter()->applyPathPrefix($media->cv);
                if(Str::contains($path,'default-imgs')){
                    
                }
                else{
                    unlink('./' .$cv_old);
                }
            }
            $cv = $request->cv;
            $cv_new = time().'-'.$cv->getClientoriginalName();
            $cv->move('uploads/media', $cv_new);
            $media->cv ='/uploads/media/'.$cv_new;
        }

        try 
        {
            $media->save();
            session()->flash('success', 'Website Media updated successfully');
        } 
        catch (Exception $th) 
        {
            session()->flash('error', 'Try again');
        }
        return redirect()->route('manage.settings.media.index');
    }
}
