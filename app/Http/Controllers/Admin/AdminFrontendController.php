<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFrontendController extends Controller
{
    public function index(){
        $featured_post=Post::take(2)->get();
        $popular_post=Post::latest()->limit(3)->get();
        $all_post=Post::latest()->paginate(4);
        $allsetting=Setting::find(1);
        $logo=Setting::find(1);
        $banner=Setting::find(1);
        return view('frontend.index',compact('featured_post','allsetting','popular_post','all_post','logo','banner'));
    }
    public function singlepost($slug){
        $single_post=Post::where('slug', $slug)->first();
        $popular_post=Post::latest()->limit(3)->get();
        $logo=Setting::find(1);
        $allsetting=Setting::find(1);

        return view('frontend.single_post',compact('single_post','allsetting','popular_post','logo'));
    }
    public function postbycategory($slug){
        $cats=Category::where('slug',$slug)->first();
        $popular_post=Post::latest()->limit(3)->get();
        $logo=Setting::find(1);
        $allsetting=Setting::find(1);


        return view('frontend.showcategorywise',compact('popular_post','allsetting','cats','logo'));
    }
}
