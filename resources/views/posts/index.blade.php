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
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>
                <div>
                    <!--Image-->
                    @foreach($post->GetImages() as $image)
                    <img id="postImage" src="{{ url('') . '/storage/' . $image->media_name }}" alt="Post Image" title="{{$post->post_comment}}">
                    @endforeach
                    <!--Footer-->
                    <div>
                    <a id="postID" href="{{ route('posts.show', $post->post_id)}}">{{$post->post_id}}</a>
                    <p id="postComment" >{{$post->post_comment}}</p>
                    <form id="postActionForm" action="{{ route('posts.destroy', $post->post_id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection