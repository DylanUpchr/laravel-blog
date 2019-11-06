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
        <a href="{{ route('posts.create')}}" class="btn btn-primary">New post</a>
    </div>   
    <div id="app">
      <table class="table" id="postTable">
        <tbody>
          @foreach($posts as $post)
            <tr>
              <td>
                <post-component 
                  :ppost = "{{$post}}"
                  :pshowid = "true"
                  :pimages = "{{json_encode($post->GetImages())}}"
                  :proutes = "{{json_encode([
                    'show' => route('posts.show', $post->post_id),
                    'edit' => route('posts.edit', $post->post_id),
                    'destroy' => route('posts.destroy', $post->post_id)
                  ])}}"
                ></post-component>
              </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
<div>
</div>
@endsection