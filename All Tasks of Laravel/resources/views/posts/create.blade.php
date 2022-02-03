@extends('layouts.app')

@section('title') Create @endsection

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
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>  
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control">
            @foreach ($users as $user)
                <option value="{{$user -> id }}">{{$user -> name }}</option>
            @endforeach
            <!-- <option value="1">Ahmed</option>
            <option value="2">Mohamed</option> -->
        </select>
    </div>

    <button class="btn btn-success">Create Post</button>
</form>
@endsection