@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a post</h1>
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
      <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="post_comment">Comment:</label>
              <input type="text" class="form-control" name="post_comment"/>
          </div>
          <div>
            <label for="post_files">File</label>
            <input type="file" name="post_files[]" multiple/>
          </div>
          <button type="submit" class="btn btn-primary">Add post</button>
      </form>
  </div>
</div>
</div>
@endsection