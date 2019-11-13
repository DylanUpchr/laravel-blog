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
    @guest
    <div>
        <a href="#" class="btn disabled btn-primary">Login to create a new post</a>
    </div>
    @else
    <div>
        <a href="{{ route('posts.create')}}" class="btn btn-primary">New post</a>
    </div>
    @endguest
    <div id="app">
      <table class="table" id="postTable">
        <tbody>
          @foreach($posts as $post)
          @php
          $user = App\User::find($post->user_id);
          if(Auth::check()){
            $currentUserID = Auth::user()->id;
          } else {
            $currentUserID = 0;
          }
          @endphp
            <tr>
              <td>
                <post-component 
                  :ppost = "{{$post}}"
                  :pshowid = "true"
                  :puser = "{{$user}}"
                  :pshowuserid = "true"
                  :pcurrentuserid = "{{$currentUserID}}"
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