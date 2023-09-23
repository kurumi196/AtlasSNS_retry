<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();
// Authを実装すると自動生成される。/vendor/laravel/framework/src/Illuminate/Routing/Router.phpのrouterインスタンスを生成している。
// authメソッドの中には下記の記述がある（一部抜粋、もっとある）。つまりメソッドが合っているならルーティング不要。
// // Authentication Routes...
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');
// // Registration Routes...
// if ($options['register'] ?? true) {
//     $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//     $this->post('register', 'Auth\RegisterController@register');
// }
// logoutで実験済み。bladeに<form action="/logout" method="post"><input type="submit" value="logout">@csrf</form>を追加したらログアウトできた。ただ通信方法やメソッド合わせないとだから逆に面倒かも。
// 参考サイト：https://senooken.jp/post/2020/04/15/4012/

// ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

// ログイン中のページ
// 複数のルートに対して１つのミドルウェアを指定する場合はRoute::groupでまとめる。公式ドキュメントにもauthというmiddlewareが準備されていることは記載があったので、あとはグループ化を
Route::group(['middleware' => 'auth'], function () {
Route::get('/top','PostsController@index');
Route::get('/logout','Auth\LoginController@logout');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');
});