@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
    <h1 class="display-3">Posts</h1>   
    <div>
        <a style="margin: 19px;" href="{{ route('posts.create')}}" class="btn btn-primary">New post</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Comment</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->post_id}}</td>
            <td>{{$post->post_comment}}</td>
            <td>
                <a href="{{ route('posts.edit',$post->post_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('posts.destroy', $post->post_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection