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
    /**
     * Get all images associated to this post
     */
    public function GetImages(){
        $mediaArray = [];

        $mediaPosts = MediaPost::all()->where('post_id', $this->post_id);
        foreach($mediaPosts as $key => $mediaPost){
            $media = Media::find($mediaPost->media_id);
            $mediaArray[] = $media;
        }

        return $mediaArray;
    }
    public function delete()
    {
        $mediaPosts = MediaPost::all()->where('post_id', $this->post_id);
        foreach($mediaPosts as $key => $mediaPost){
            $media = Media::find($mediaPost->media_id);
            Storage::delete("public/" . $media->media_name);
            $media->delete();
        }
        parent::delete();
    }
}
