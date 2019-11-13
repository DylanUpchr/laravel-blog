@extends('base')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
    <h1 class="display-3">Home</h1>   
    <div>
      </div>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in, {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}!
                </div>

            <div class="card">
                <div class="card-header">Your posts</div>

                <div id="app">
                    <table class="table" id="postTable">
                        <tbody>
                            @php
                                use App\Http\Controllers\PostController;
                                $user = Auth::user();
                                $currentUserID = $user->id;
                                $posts = PostController::getPostsByUser($currentUserID);
                            @endphp
                            @foreach($posts as $post)
                                <tr>
                                <td>
                                    <post-component 
                                    :ppost = "{{$post}}"
                                    :pshowid = "true"
                                    :pshowuserid = "false"
                                    :puser = "{{$user}}"
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
