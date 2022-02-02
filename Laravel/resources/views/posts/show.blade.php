@extends('layouts.app')

@section('title') Create @endsection

@section('content')

<div class="card mb-3">
  <h5 class="card-header">Post Info.</h5>
  <div class="card-body">
    <b class="card-title">Title :</b>
    <span class="card-text">{{ $post -> title }}</span> <br>
    <b class="card-title">Description : </b>
    <span class="card-text">{{ $post -> description }}</span>
  </div>
</div>
<div class="card">
  <h5 class="card-header">Post Creater Info.</h5>
  <div class="card-body">
    <b class="card-title">Name : </b>
    <span class="card-text">{{ isset($post->user) ? $post->user->name : 'Not Found' }}</span>
    <div>
      <b class="card-title">Email : </b>
      <span class="card-text">{{isset($post->user) ? $post->user->email : 'Not Found'}}</span>
    </div>
    <b class="card-title">Created At : </b>
    <span class="card-text">{{ $post->created_at->format('l jS \of F Y h:i:s A')}}</span>
  </div>
</div>
</form>
@endsection