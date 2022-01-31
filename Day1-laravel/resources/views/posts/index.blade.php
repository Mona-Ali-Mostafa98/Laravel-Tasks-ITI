@extends('layouts.app')

@section('title')Index @endsection

@section('content')
<div class="text-center ">
    <a href="{{ route('posts.create') }}" class="btn btn-success mb-4">Create Post</a>
</div>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allPosts as $post)
        <tr>
        <th scope="row">1</th>
        <td>{{ $post['title'] }}</td>
        <td>{{ $post['posted_by'] }}</td>
        <td>{{ $post['created_at'] }}</td>
        <td>
            <a href="/posts/{post}"  title="View" data-toggle="tooltip"><i class="material-icons text-info">&#xE417;</i></a>
            <a href="/posts/{post}/edit"  title="Edit" data-toggle="tooltip"><i class="material-icons text-warning">&#xE254;</i></a>
            <a href="#" title="Delete" data-toggle="tooltip"><i class="material-icons text-danger">&#xE872;</i></a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
    <nav aria-label="Page navigation example">
    <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#" >1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>
@endsection
<!-- styling on icons -->
<style>
table tr th, table tr td {
border-color: #e9e9e9;
}
table td:last-child { /*actions */
width: 150px;
}
.table td a {
display: inline-block;
margin: 0 10px;
}
table.table td i {
font-size: 20px;
} 
.pagination {
float: right;
margin: 0 0 5px;
}
</style>