<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $allPosts = Post::all();
        return view("post/index", compact("allPosts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        Post::create($request->validate(
            ["title"=>"required|string" 
            , "content"=>"required|string|" 
            , "img_cover"=>"nullable"]
        ));

        return redirect()->route('posts.index')->with("alert" ,"Post Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $singlePost = Post::find($id);
        return view('post/show' , compact('singlePost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $singlePost = Post::find($id);
        return view('post/edit' , compact('singlePost'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Post::where('id' , $id)->update($request->validate(
            [ "title"=>"required|string|" 
            , "content"=>"required|string|" 
            , "img_cover"=>"nullable"]
        ));

        return redirect()->route("posts.edit" , ['post'=> $id])->with("alert" ,"Post Updated Successfully");

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
        Post::destroy($id);
        return redirect()->route('posts.index')->with('alert','Post Deleted Successfully');
    }
}
