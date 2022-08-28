<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{
    public function logoshow(){
        $logo=Setting::find(1);
        return view('backend.settings.logo.index',compact('logo'));
    }
    public function allsettingsshow(){
        $allsetting=Setting::find(1);
        return view('backend.settings.allsettings',compact('allsetting'));
    }
    public function settingupdate(Request $req){
        $setting_update=Setting::find(1);
        $setting_update->website_title=$req->website_title;
        $setting_update->banner_heading=$req->banner_heading;
        $setting_update->banner_paragraph=$req->banner_paragraph;
        $setting_update->footer_paragraph=$req->footer_paragraph;
        $setting_update->facebook=$req->facebook;
        $setting_update->twitter=$req->twitter;
        $setting_update->instragram=$req->instragram;
       
        // $setting_old_logo=$req->old_logo;
        // $setting_logo_name='';
        if($req->hasFile('logo')){
            $setting_logo=$req->file('logo');
            $setting_logo_name=md5(time().rand()).'.'.$setting_logo->getClientOriginalExtension();
            $setting_logo->move(public_path('media/settings/logo'),$setting_logo_name);
            $setting_update->logo=$setting_logo_name;
        }
        // }else{
        //     $setting_logo_name=$setting_old_logo;
        // }

      
        // $setting_banner_logo=$req->banner_logo;
        // $setting_banner_name='';
        if($req->hasFile('banner')){
            $setting_banner=$req->file('banner');
            $setting_banner_name=md5(time().rand()).'.'.$setting_banner->getClientOriginalExtension();
            $setting_banner->move(public_path('media/settings/banner'),$setting_banner_name);
            $setting_update->banner=$setting_banner_name;

        }
        // else{
        //     $setting_banner_name=$setting_banner_logo;
        // }
       
      



        $setting_update->update();
        Alert::success('Success!', 'Setting update Successfull');
        return redirect()->back();
    }
    // public function logoupdate(Request $req){
    //     $logo=$req->file('logo');
    //     $old_logo=$req->old_logo;
    //     $logo_name='';
    //     if($req->hasFile('logo')){
    //         $logo_name=md5(time().rand()).'.'.$logo->getClientOriginalExtension();
    //         $logo->move(public_path('media/settings/logo'),$logo_name);

    //     }else{
    //         $logo_name=$old_logo;
    //     }
    //     $logo_update=Setting::find(1);
    //     $logo_update->logo=$logo_name;
    //     $logo_update->update();
    //     return redirect()->back()->with('success','logo update successfull');
    // }
    // public function bannershow(){
    //     $banner=Setting::find(1);
    //     return view('backend.settings.banner.index',compact('banner'));
    // }
    // public function bannerupdate(Request $req){
    //     $banner=$req->file('banner');
    //     $banner_logo=$req->banner_logo;
    //     $banner_name='';
    //     if($req->hasFile('banner')){
    //         $banner_name=md5(time().rand()).'.'.$banner->getClientOriginalExtension();
    //         $banner->move(public_path('media/settings/banner'),$banner_name);

    //     }else{
    //         $banner_name=$banner_logo;
    //     }
    //     $banner_update=Setting::find(1);
    //     $banner_update->banner=$banner_name;
    //     $banner_update->update();
    //     return redirect()->back()->with('success','Banner update successfull');
    // }
}
