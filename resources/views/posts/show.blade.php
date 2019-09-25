@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <h1 class="display-3">Post {{ $post->post_id }}</h1>   
    <div>
    <a style="margin: 19px;" href="{{ route('posts.index')}}" class="btn btn-primary"></span>Back</a>
    </div>   
    <div class="card">
        <!--Image-->
        @foreach($post->GetImages() as $image)
          <img id="postImage" src="{{ url('') . '/storage/' . $image->media_name }}" alt="Post Image" title="{{$post->post_comment}}">
        @endforeach
        <!--Footer-->
        <div class="card-body">
          <p id="postComment" >{{$post->post_comment}}</p>
          <form id="postActionForm" action="{{ route('posts.destroy', $post->post_id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </div>
    </div>
<div>
</div>
@endsection