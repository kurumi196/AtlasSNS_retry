<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
            // return redirect('/login');
            // name()を使わずにredirectで飛ばそうと思ったけど下記のように公式ドキュメントに記載があるから名前付き
            // ミドルウェアが未認証ユーザーを突き止めると、ユーザーをlogin名前付きルートへリダイレクトします。

        }
    }
}
