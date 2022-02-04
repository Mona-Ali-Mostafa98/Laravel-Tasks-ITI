<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    // index function 
    public function index()
    {
        $allPosts = Post::all();
        return  $allPosts ;
    }
    // show function 
    public function show($postId)
    {
        $post = Post::findOrFail($postId);   
        // return  $post ;
        // transformation for data - return associative array of only some attributes
        return [
            'id' => $post->id ,
            'title' => $post->title ,
            'description' => $post->description ,
            'user_name' => $post->user->name ,
        ];
    }
    // store function for api will enter as json in postman like {"title":"hello world 44", "description":"description","post_creator": 3 }
      
    public function store(StorePostRequest $request)
    {
        $data = request()->all(); 
        $post=Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            'slug' => str_slug($data['title']),    
        ]);
        return [
            'id' => $post->id ,
            'title' => $post->title ,
            'description' => $post->description ,
            'user_name' => $post->user->name ,
        ];
        }

}
