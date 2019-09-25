@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Edit a post</h1>
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
      <form method="post" action="{{ route('posts.update', $post->post_id) }}">
          @method('PATCH') 
          @csrf
          <div class="form-group">    
              <label for="post_comment">Comment:</label>
              <input type="text" class="form-control" name="post_comment"/>
          </div>                   
          <button type="submit" class="btn btn-primary">Edit post</button>
      </form>
    </div>
  </div>
</div>
@endsection