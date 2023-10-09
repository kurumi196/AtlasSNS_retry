<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $follow_id=Auth::user()->follow()->pluck('followed_id');
        $posts=Post::where('user_id',Auth::id())->orWhereIn('id',$follow_id)->get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function create(Request $request){

        $request->validate(['post'=>'required|between:1,150']);
        Post::create([
            'post'=>$request->post,
            'user_id'=>Auth::id(),
        ]);

        return back();
    }

    public function edit(Request $request){
        $request->validate(['post'=>'required|between:1,150']);
        Post::where('id',$request->post_id)->update(['post'=>$request->post]);
        return back();
    }

    public function delete($id){
        Post::where('id',$id)->delete();
        return back();
    }

}
