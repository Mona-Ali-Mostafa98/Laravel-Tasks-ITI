<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = [
            ['title' => 'First Post', 'posted_by'=> 'Ahmed', 'created_at' => '2022-01-20'],
            ['title' => 'Second Post', 'posted_by'=> 'Mohamed', 'created_at' => '2022-01-20'],
            ['title' => 'Third Post', 'posted_by'=> 'Ali', 'created_at' => '2022-01-20'],
        ];

        return view('posts.index', [
            'allPosts' => $allPosts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // dd('test'); any logic after dd won't be executed
        //the logic to store post in the db
        return redirect()->route('posts.index');
    }

    public function show()
    {
        // return $postId;
        return view('posts.show');
    }

    public function edit($postId)
    {
        return $postId;
    }

    public function destroy($postId)
    {
        return $postId;
    }



}