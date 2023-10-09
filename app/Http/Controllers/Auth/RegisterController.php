<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            // https://readouble.com/laravel/6.x/ja/validation.html
            $request->validate([
                'username'=>'required|min:2|max:12',
                'mail'=>'required|email|between:5,40|unique:users,mail',
                'password'=>'required|regex:/^[a-zA-Z0-9]+$/|between:8,20|confirmed', // https://laraweb.net/knowledge/6265/
                'password_confirmation'=>'required|regex:/^[a-zA-Z0-9]+$/|between:8,20',
            ]);
            // エラーメッセージの日本語化は下記コマンド打って一発。attributesでname属性だけ教えてあげれば良い。config/app.phpも書き換えるよ。
            // php -r "copy('https://readouble.com/laravel/8.x/ja/install-ja-lang-files.php', 'install-ja-lang.php');"
            // php -f install-ja-lang.php
            // php -r "unlink('install-ja-lang.php');"
            // https://readouble.com/laravel/8.x/ja/validation-php.html
            // https://codelikes.com/laravel-validation-message-ja/#toc7
            // Laravel8のドキュメントなので6があれば探した方が良いかも

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            return redirect('added')->with('username',$username);
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
