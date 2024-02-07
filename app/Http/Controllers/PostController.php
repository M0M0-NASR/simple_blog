<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('authoraize')->only(["store", "update", "destroy"]);
    }

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

        return view("post/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate(
            [
                "title" => "required|string|"
                ,
                "content" => "required|string|"
                ,
                "img_cover" => "nullable|file|image"
                ,
                "user_id" => "required|"
            ]
        );

        // Handle Image Upload
        if($request->file('img_cover'))
        {

            $data['img_cover'] = request()->file('img_cover')->store("posts");        
        }
        
        Post::create($data);
        
        request()->session()->flash('alert', 'Post Created Successfully');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $singlePost = Post::find($id);
        return view('post/show', compact('singlePost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $singlePost = Post::find($id);
        return view('post/edit', compact('singlePost'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate(
            [
                "title" => "required|string|"
                ,
                "content" => "required|string|"
                ,
                "img_cover" => "nullable|file|image"
                ,
                "user_id" => "required|"
            ]
        );

        // Handle Image Upload
        if($request->file('img_cover'))
        {

            $data['img_cover'] = request()->file('img_cover')->store("posts");        
        }

        Post::where('id', $id)->update($data);

        request()->session()->flash('alert', 'Post Updated Successfully');

        return redirect()->route("posts.edit", ['post' => $id]);

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
