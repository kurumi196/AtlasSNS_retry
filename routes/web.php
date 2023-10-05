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
Route::group(['middleware' => 'auth'], function () {
    // ルートグループは複数のルートで共通なルート属性（ミドルウェアや名前空間など）を一括して適用するための方法。
        // Route::group(['middleware' => 'auth'], function () {//各ルートを記述});)
            // 第一引数に共通のルート属性を配列で指定
        // Route::middleware(['auth'])->group(function () {// 各ルートを記述});
            // authというmiddlewareが用意されているのは公式ドキュメントに記載あり
        // Route::namespace('Admin')->group(function () {// 各ルートを記述});
            // namespace App\Http\Controllers\Admin;というnamespaceを設定しているControllerのみ使用できる。
    // グループをネスト（グループの中にさらにグループを配置すること）させると、自動的に適切な形で親のグループ属性がマージ(結合)される。
    // ミドルウェア・where条件はマージ、名前・名前空間・プレフィックスは追加。名前空間のデリミタ(\)とURIプレフィックス中のスラッシュも自動で追加される。
    // 【プレフィックス (Prefix)】 ルートのURI（Uniform Resource Identifier）の先頭に追加される部分。URIプレフィックスが'/admin'の場合、'/admin/dashboard'といったURIが生成される。
    // 【名前空間】ControllerやModelの冒頭に書いてあるnamespaceのこと。同じ名前のクラスが異なる場所で使用されている場合でも名前の衝突を防ぐ。

Route::get('/top','PostsController@index');
Route::get('/logout','Auth\LoginController@logout');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');
});