@extends('layouts.app')

@section('title')Index @endsection

@section('content')
<div class="text-center ">
    <a href="{{ route('posts.create') }}" class="btn btn-success btn-lg  mb-3">Create Post</a>
</div>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allPosts as $post)
        <tr>
        <th scope="row">{{ $post -> id }}</th>
        <td>{{ $post -> title }}</td>
        <td>{{ $post -> slug }}</td>
        <td>{{ isset($post->user) ? $post->user->name : 'Not Found' }}</td> 
        <td>{{ $post->created_at->toDateString()}}</td>   <!-- to show date only we use Carbon\Carbon; in web.php and add function toDateString() to show date only  -->
        <!-- <td>{{ $post['created_at']}}</td> --> 
        <td>
            <!-- <a href="/posts/{post}"  title="View" data-toggle="tooltip"><i class="material-icons text-info">&#xE417;</i></a> -->
            <a class="btn" href="{{route('posts.show',['post'=>$post->id])}}"  title="View" data-toggle="tooltip"><i class="material-icons text-info">&#xE417;</i></a>
            <a class="btn" href="{{route('posts.edit',['post'=>$post->id])}}"  title="Edit" data-toggle="tooltip"><i class="material-icons text-warning">&#xE254;</i></a>
            <!-- <a href="{{route('posts.destroy',['post'=>$post->id])}}" title="Delete" data-toggle="tooltip"><i class="material-icons text-danger">&#xE872;</i></a> -->
            <form method='post'action="{{route('posts.destroy',['post'=>$post->id])}}"  style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn" type="submit" id='delete' class="btn" title="Delete" data-toggle="tooltip"><i class="material-icons text-danger">&#xE872;</i></button>
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $allPosts->links() }}  <!--add pagination bar using laravel-->

@endsection

<!-- styling on icons -->
<style>
table tr th, table tr td {
border-color: #e9e9e9;
}
table td:last-child { /*actions */
width: 200px;
}
.table td a {
display: inline-block;
/* margin: 0 10px; */
}
table.table td i {
font-size: 20px;
} 
.pagination {
float: right;
margin: 0 0 5px;
}
</style>