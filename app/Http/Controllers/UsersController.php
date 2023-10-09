<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class UsersController extends Controller
{
    //

    public function search(Request $request){
        $keyword=$request->keyword;
        if($keyword){
            $users=User::where('username','like','%'.$keyword.'%')->where('id','<>',Auth::id())->get();
        }else{
            $users=User::where('id','<>',Auth::id())->get();
        }
        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
    }

    public function follow($id){
        Auth::user()->follow()->attach($id);
        return back();
    }
    public function unfollow($id){
        Auth::user()->follow()->detach($id);
        return back();  
    }

    public function followList(){
        $follow_id=Auth::user()->follow()->pluck('followed_id');
        $users=User::whereIn('id',$follow_id)->get();
        $posts=Post::whereIn('user_id',$follow_id)->get();
        return view('follows.followList',['users'=>$users,'posts'=>$posts]);
    }
    public function followerList(){
        $follower_id=Auth::user()->followed()->pluck('following_id');
        $users=User::whereIn('id',$follower_id)->get();
        $posts=Post::whereIn('user_id',$follower_id)->get();
        return view('follows.followerList',['users'=>$users,'posts'=>$posts]);
    }

    public function profile($id=0){
        if($id == 0){
            $user=null;
            $posts=null;
        }else{
            $user=User::where('id',$id)->first();
            $posts=Post::where('user_id',$id)->get();

        }
        return view('users.profile',['id'=>$id,'user'=>$user,'posts'=>$posts]);
    }

    public function update(Request $request){
        $request->validate([
            'username'=>'required|min:2|max:12',
            'mail'=>'required|email|between:5,40|unique:users,mail,'.Auth::id().',id',
            'password'=>'required|regex:/^[a-zA-Z0-9]+$/|between:8,20|confirmed',
            'password_confirmation'=>'required|regex:/^[a-zA-Z0-9]+$/|between:8,20',
            'bio'=>'max:150',
            'images'=>'image',
        ]);

        $image_name=$request->file('images')->getClientOriginalName();
        if($request->file('images')){
        $request->file('images')->storeAs('public',$image_name);
        }

        User::where('id',Auth::id())->update([
            'username'=>$request->username,
            'mail'=>$request->mail,
            'password'=>bcrypt($request->password),
            'bio'=>$request->bio,
            'images'=>$image_name,
        ]);
        return redirect('/top');
    }
}
