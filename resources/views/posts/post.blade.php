<div class="post card">
    @php
    $post = $posts['post']; //Post passed in array "posts", needed to extract post
    @endphp
    <!--Image-->
    @foreach($post->GetImages() as $image)
        <img id="postImage" src="{{ url('') . '/storage/' . $image->media_name }}" alt="Post Image" title="{{$post->post_comment}}">
    @endforeach
    <!--Footer-->
    <div class="card-body">
        @if ($posts['showID'])
        <a id="postID" href="{{ route('posts.show', $post->post_id)}}">{{$post->post_id}}</a>
        <br/>
        @endif
        <span id="postComment" >{{$post->post_comment}}</span>
        <span id="postActionFormContainer">
            <form class="postActionForm" action="{{ route('posts.edit', $post->post_id)}}" method="get">
                @csrf
                @method('GET')
                <button class="btn btn-primary" type="submit">Edit</button>
            </form>
            <form class="postActionForm" action="{{ route('posts.destroy', $post->post_id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </span>
    </div>
</div>