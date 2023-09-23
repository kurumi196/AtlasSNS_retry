<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("posts")->insert([
            ["user_id"=>"1","post"=>"001_001",],
            ["user_id"=>"2","post"=>"002_001",],
            ["user_id"=>"2","post"=>"002_002",],
            ["user_id"=>"3","post"=>"003_001",],
            ["user_id"=>"3","post"=>"003_002",],
            ["user_id"=>"3","post"=>"003_003",],
            ["user_id"=>"4","post"=>"004_001",],
            ["user_id"=>"4","post"=>"004_002",],
            ["user_id"=>"4","post"=>"004_003",],
            ["user_id"=>"4","post"=>"004_004",],
            ["user_id"=>"5","post"=>"005_001",],
            ["user_id"=>"5","post"=>"005_002",],
            ["user_id"=>"5","post"=>"005_003",],
            ["user_id"=>"5","post"=>"005_004",],
            ["user_id"=>"5","post"=>"005_005",]]);

    }
}