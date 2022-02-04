@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

 <!-- error message -->
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('posts.edit',['post'=>$post->id])}}">
    @csrf  
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input value="{{$post->title}}"  name="title" type="text" class="form-control" id="exampleFormControlInput1">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea  name='description' class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>  
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
        <select name="user_name" class="form-control">
            @foreach ($users as $user)
                <option value="{{$user->id}}" @if($user->id==$post->user_id) selected @endif > {{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Update Post</button>
</form>
@endsection

