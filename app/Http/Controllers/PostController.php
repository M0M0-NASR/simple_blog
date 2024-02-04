<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(request()->session()->all());

        $allPosts = Post::all();
        return view("post/index", compact("allPosts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view("post/create" );
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {

        // $user = User::find($request->user_id);
        // if($user->token !== $request->session()->get("user")['token'])
        //     return redirect()->route('posts.index')->with("alert" ,"Un Authrize Action");        
        
        Post::create($request->validate(
            ["title"=>"required|string" 
            , "content"=>"required|string|" 
            , "img_cover"=>"nullable"
            , "user_id" =>"required"]
            ));

        request()->session()->flash('alert', 'Post Created Successfully');


        return redirect()->route('posts.index');
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

        request()->session()->flash('alert', 'Post Updated Successfully');

        return redirect()->route("posts.edit" , ['post'=> $id]);

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

        request()->session()->flash('alert', 'Post Deleted successful!');


        return redirect()->route('posts.index');
    }
}
