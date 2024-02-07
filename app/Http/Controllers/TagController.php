<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all()->pluck("name")->toArray();
        return response()->json($tags);
    }
}