<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $fakeData = [
        "1" => [ "title" => "Facebook", "posted_by" => "ali", "created_at" => "2022-2-2 12:1 PM" , 
                "content"=> "this is first time to wrete this is first time to wrete this is first time
                            to wrete this is first time to wrete this is first time to wrete "] ,
        "2" => [ "title" => "First", "posted_by" => "moo", "created_at" => "2022-2-2 12:1 PM",
                "content"=> "this is first time to wrete this is first time to wrete this is first time
                            to wrete this is first time to wrete this is first time to wrete "]
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
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
