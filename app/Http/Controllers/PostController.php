<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $fakeData = [
        "1" => [ "title" => "Facebook", "posted_by" => "ali", "created_at" => "2022-2-2 12:1 PM" , 
                "content"=> "this is first time to wrete this is first time to wrete this is first timeto wrete this is first time to wrete this is first time to wrete "] ,
        "2" => [ "title" => "First", "posted_by" => "moo", "created_at" => "2022-2-2 12:1 PM",
                "content"=> "this is first time to wrete this is first time to wrete this is first time to wrete this is first time to wrete this is first time to wrete "]
    ];
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->fakeData;
        
        return view("post/index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("post/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Post::create($request->validate(
            ["title"=>"required|" 
            , "content"=>"required|string|" 
            , "img_cover"=>"nullable"]
        ));

        return to_route('posts.create' , ["error"=>false]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = $this->fakeData[$id];
        return view('post/show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = $this->fakeData[$id];
        return view('post/edit' , compact('post' , 'id'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
    * display the share page
    */
    public function share(string $id)
    {
        //
        throw new \Exception('Not Implemnted yet');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
