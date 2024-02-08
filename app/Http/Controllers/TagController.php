<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(string $id = null)
    {
        if (!$id){
            $tags = Tag::all()->pluck('id' , 'name');
            return response()->json($tags);
        }

        $postTags = Post::find($id)->tags()->pluck("tag_id", "name");
        $notSelectedTags = Tag::whereNotIn("id", array_values($postTags->toArray()))->pluck('id', 'name');
        
        return response()->json($notSelectedTags);
    }
}