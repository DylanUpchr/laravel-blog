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
<div>
</div>
@endsection