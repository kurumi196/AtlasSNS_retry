<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::create()で複数レコードを登録しようとしたがNG。create()メソッドは複数レコードを多次元配列で登録とかはできないらしい。create()メソッドで複数レコードを登録する際はforeachを使用すればできる。けどめんどくさそう。
        //DBの場合はuse宣言不要
        DB::table("users")->insert([
            [
                "username"=>"001",
                "mail"=>"001@com",
                "password"=>bcrypt("00000001"),
            ],
            [
                "username"=>"002",
                "mail"=>"002@com",
                "password"=>bcrypt("00000002"),
            ],
            [
                "username"=>"003",
                "mail"=>"003@com",
                "password"=>bcrypt("00000003"),
            ],
            [
                "username"=>"004",
                "mail"=>"004@com",
                "password"=>bcrypt("00000004"),
            ],
            [
                "username"=>"005",
                "mail"=>"005@com",
                "password"=>bcrypt("00000005"),
            ]]);
    }
}
