@extends('base')

@section('main')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

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
    <div id="app">
      @php
      $user = App\User::find($post->user_id);
      $currentUserID = Auth::user()->id;
      @endphp
      <post-component 
        :ppost = "{{$post}}"
        :pshowid = "false"
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
    </div>
<div>
</div>
@endsection