<?php

namespace App;

use App\Media;
use App\MediaPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $primaryKey = 'post_id';
    protected $fillable = [
        'post_id',
        'post_comment'
    ];
    public function delete()
    {
        /*public function delete(){
        $mediaPosts = MediaPost::all()->where('post_id', $this->post_id);
        foreach($mediaPosts as $key => $mediaPost){
            //$mediaPost->delete();
            $media = Media::find($mediaPost->media_id);
            $media->delete();
            //dd($media);
            /*\DB::transaction(function() use ($media, $mediaPost) {
                //$media->delete();
                //$mediaPost->delete();
            });
        }
    }*/
        $mediaPosts = MediaPost::all()->where('post_id', $this->post_id);
        foreach($mediaPosts as $key => $mediaPost){
            $media = Media::find($mediaPost->media_id);
            //dd($media);
            Storage::delete("public/" . $media->media_name);
            $media->delete();
        }
        parent::delete();
    }
}
