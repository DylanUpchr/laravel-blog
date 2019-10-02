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
  <table class="table">
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>
              @component('posts.post')
                @slot('posts', ['post' => $post, 'showID' => true])
              @endcomponent
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection