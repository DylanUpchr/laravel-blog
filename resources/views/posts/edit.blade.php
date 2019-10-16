@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Edit post</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div>
    <a style="margin: 10px;" href="{{ route('posts.index')}}" class="btn btn-primary"></span>Back</a>
    <a style="margin: 10px;" href="{{ route('posts.create')}}" class="btn btn-primary">Add media</a>
    </div>   
      <table class="table">
        <thead>
          <tr>
            <th>
              Images
            </th>
            <th>
              Actions
            </th>
          </tr>
        </thead>
        <tbody>
    @foreach($post->GetImages() as $image)
          <tr>
            <td>
              <img id="editPostImage" src="{{ url('') . '/storage/' . $image->media_name }}" alt="Post Image" title="{{$post->post_comment}}">
            </td>
            <td>
            <form class="postActionForm" action="{{ route('posts.destroyMedia', ['post' => $post->post_id, 'media' => $image->media_id])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            </td>
          </tr>
    @endforeach
        </tbody>
      </table>
      <form method="post" action="{{ route('posts.update', $post->post_id) }}">
          @method('PATCH') 
          @csrf
          <div class="form-group">    
              <label for="post_comment">Comment:</label>
              <input type="text" class="form-control" name="post_comment" value="{{$post->post_comment}}"/>
          </div>                   
          <button type="submit" class="btn btn-primary">Edit post</button>
      </form>
    </div>
  </div>
</div>
@endsection