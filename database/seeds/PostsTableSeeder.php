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
        // DB::table("posts")->insert([
        //     ["user_id"=>"1","post"=>"001_001",],
        //     ["user_id"=>"2","post"=>"002_001",],
        //     ["user_id"=>"2","post"=>"002_002",],
        //     ["user_id"=>"3","post"=>"003_001",],
        //     ["user_id"=>"3","post"=>"003_002",],
        //     ["user_id"=>"3","post"=>"003_003",],
        //     ["user_id"=>"4","post"=>"004_001",],
        //     ["user_id"=>"4","post"=>"004_002",],
        //     ["user_id"=>"4","post"=>"004_003",],
        //     ["user_id"=>"4","post"=>"004_004",],
        //     ["user_id"=>"5","post"=>"005_001",],
        //     ["user_id"=>"5","post"=>"005_002",],
        //     ["user_id"=>"5","post"=>"005_003",],
        //     ["user_id"=>"5","post"=>"005_004",],
        //     ["user_id"=>"5","post"=>"005_005",]]);
        
            $posts=[["user_id"=>"1","post"=>"1番目の投稿",],
                    ["user_id"=>"2","post"=>"2番目の投稿",],
                    ["user_id"=>"3","post"=>"3番目の投稿",],
                    ["user_id"=>"4","post"=>"4番目の投稿",],
                    ["user_id"=>"5","post"=>"5番目の投稿",]];
        foreach($posts as $post){
            Post::create($post);
        }

    }
}