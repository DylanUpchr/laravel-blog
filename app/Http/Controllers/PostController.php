<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Media;
use App\MediaPost;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public static function getPostsByUser($userID){
        $posts = Post::where('user_id', $userID)
        ->get();
        $posts = $posts->reverse();
        return $posts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::whereNotNull('post_id')
        ->get();
        $posts = $posts->reverse();
        return view('posts.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $request->validate([
                'post_comment'=>'required',
                'post_files.*' => 'required|mimes:png,jpg,jpeg,mp4,mp3'
            ]);

            $post = new Post([
                'post_comment' => $request->get('post_comment'),
                'user_id' => Auth::user()->id
            ]);
            $files = $request->file('post_files');
            if ($files === null){
                $files=[];
            }

            $post->save();
            $post_id = $post->post_id;
            
            foreach($files as $file){
                $filename = $file->store('media', 'public');
                $media = new Media([
                    'media_type' => Storage::mimeType("public/" . $filename),
                    'media_name' => $filename
                ]);
                
                $media->save();
                $media_id = $media->media_id;


                $mediaPost = new MediaPost([
                    'post_id' => $post_id,
                    'media_id' => $media_id
                ]);
                $mediaPost->save();
            }

            return redirect('/posts')->with('success', 'Post saved!');
        }
        else{
            return redirect('/posts')->with('error', 'Please log in to create a post.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_comment'=>'required'
        ]);

        $post = Post::find($id);
        $post->post_comment = $request->get('post_comment');
        $post->save();
        return redirect('/posts')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted!');
    }
    /**
     * Remove the specified media.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMedia(Post $post, Media $media)
    {
        $media->delete();
        return redirect('/posts/edit/'.$post->post_id)->with('success', 'Media deleted!');
    }
}
