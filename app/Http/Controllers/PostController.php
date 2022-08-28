<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $data = Post::latest()->get();
        return view('backend.post.index',compact('categories','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [

        //     'fimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //   ]);

        //   if($validator->fails())
        //   {
        //     return response()->json([
        //         'status'=>400,
        //         'errors' => $validator->messages()
        //        ]);

        //   }
        //   else{
            if($request->hasFile('fimg')){
                $img = $request->file('fimg');
                $file_name=md5(time().rand()).'.'.$img->getClientOriginalExtension();
                $img->move(public_path('media/posts'),$file_name);
            }else{
                $file_name='';
            }
    
            $post_user=Post::create([
               
               'title'=>$request->title,
               'slug'=>Str::slug($request->title),
               'user_id'=>Auth::user()->id,
               'content' => $request->content,
               'featured_image' => $file_name,
           ]);
           $post_user->categories()->attach($request->category);
           return response()->json([
            'status'=>200
           ]);
        //   }
    
        
        
     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Post::find($id);
        $cat_all=Category::all();
        $post_cat=$data->categories;
        $check_id=[];
        foreach($post_cat as $check_cat){
            array_push($check_id,$check_cat->id);
        }
        $cat_list='';
        $cat_list.='<select name="category[]" class="form-control" style="width:30%" id="category" required>
                    <option value="">--Select Category--</option>';
        foreach($cat_all as $cat){
            if(in_array($cat->id, $check_id)){
                $checked='selected';
            }else{
                $checked='';
            }
            $cat_list .='<option '.$checked.' value="'.$cat->id.'">'.$cat->name.'</option>';
        }
        $cat_list.='</select>';
        
        // return view('post.index',compact('cat_all'));
        return[
            'id'=>$data->id,
            'title' => $data->title,
            'image' => $data->featured_image,
            'content' => $data->content,
            'cat_list' => $cat_list,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    //UPDATE POST
    public function postupdate(Request $request){

        $post_id=$request->id;
        $post_data=Post::find($post_id);
        $post_data->title = $request->title;
        $post_data->slug = Str::slug($request->title);
        $post_data->content = $request->content;
        if($request->hasFile('fimg')){
            unlink(public_path('media/posts/').$post_data->featured_image);
            $img = $request->file('fimg');
            $file_name=md5(time().rand()).'.'.$img->getClientOriginalExtension();
           
            $img->move(public_path('media/posts'),$file_name);
            $post_data->featured_image=$file_name;
       
        }
        $post_data->update();
        $post_data->categories()->detach();
        $post_data->categories()->attach($request->category);
        Alert::success('Success!', 'Post update Successfull');
        return redirect()->route('post.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::find($id);
        $data->categories()->where('post_id',$id)->detach();
        unlink(public_path('media/posts/').$data->featured_image);
        
        $data->delete();
        return redirect()->route('post.index')->with('success','Post Deleted successfull');

    
    }
}
