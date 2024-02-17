<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Jorenvh\Share\ShareFacade;
use Illuminate\Http\Request;

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

        $user_id = request()->session()->get("user")['id'];

        $allPosts = Post::where("user_id", $user_id)->get();

        $share = ShareFacade::currentPage()
            ->facebook()
            ->twitter()
            ->linkedin('')
            ->whatsapp();

        return view("post/index", compact("allPosts" , "share"));
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
        // dd(request()->tags);
        if (request()->has("tags")) {
            $tagsExists = Tag::whereIn("id", request()->tags)->exists();
            if (!$tagsExists) {
                request()->session()->flash("alert", "Errors with Tags");
                return redirect()->route('posts.create');

            }
        }


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
        if ($request->file('img_cover')) {

            $data['img_cover'] = request()->file('img_cover')->store("posts");
        }

        Post::create($data)->tags()->sync($request->tags);

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
        if ($request->file('img_cover')) {

            $data['img_cover'] = request()->file('img_cover')->store("posts");
        }

        // Update posts table and post_tag_table
        Post::find($id)->update($data);
        Post::find($id)->tags()->sync(request()->tags);

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

    /**
     * Live search in Posts Table.
     */
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $posts = Post::where('title', 'LIKE', '%' . $request->search . "%")
                ->where('content', 'LIKE', '%' . $request->search . "%")
                ->get();
            if ($posts) {
                foreach ($posts as $key => $post) {
                    $id = $post->id;
                    $output .= '<div>' .
                        "<a href='posts/$id/show' >" . $post->title . '</a>' .
                        '<h2>' . $post->content . '</h2>' .
                        '</div>';
                }
            }
            if (count($posts) == 0) {
                $output = "<div class='d-flex justify-content-center'>No Posts Available </div>";
            }
            return Response($output);

        }

    }
}
