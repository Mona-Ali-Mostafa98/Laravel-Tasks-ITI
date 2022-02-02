<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // query
        $allPosts = Post::all();  //to retrieve all records
        // // dd($allPosts);
        //  $allPosts = Post::where('title','Test')->get();

        return view('posts.index', [
            'allPosts' => $allPosts
        ]);
    }

    public function create()
    {
        // return view('posts.create');
        $users = User::all(); 
        return view('posts.create',[
            'users' => $users
        ]);
    }
//////////////////////////////////////store//////////////////
    public function store()
    {
// lab1
        // dd('test'); any logic after dd won't be executed
        //the logic to store post in the db
        // return redirect()->route('posts.index');
// lab3 validaton
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5']
        ],[
                'title.required' => 'this is the changed message',
                'title.min' => 'i have changed the min'
            
        ]);
// lab2
        $data = request()->all(); //global helpar method
        // dd($data);
        // Post::create($data);
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],

         // static data 
            // 'title' => 'css',
            // 'description' => 'learn css',
            // 'id ' =>'5'
        ]);
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        $post = Post::findOrFail($postId);  //if you can use (find) if any date not finded will show error  
        // return $postId;
        // return view('posts.show');        
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit($postId)
    {
        $post=post::findOrFail($postId);
        $users = User::all();
        return view('posts.edit',[
            'post'=>$post,'users'=>$users
        ]);
    }

    public function update($postId,Request $req){
        $post=post::findOrFail($postId);
        $post->edit([
            'title' => $req['title'],
            'description' => $req['description'],
            'user_id' => $req['user_name'],
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy($postId,Request $req)
    {
        $post=post::findOrFail($postId);
        $post->delete();
        return redirect()->route('posts.index');
    }


}