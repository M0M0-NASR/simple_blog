<?php



namespace App\Http\Controllers;

use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $user = request()->session()->get("user");
        // dd($user);

        return view("user/index", compact("user"));
    }
    public function show($id)
    {
        $user = User::find($id);

        return view("user/index", compact("user"));
    }
    public function edit(string $id)
    {
        $user = User::find($id);

        return view("user/edit", compact("user"));
    }
    public function update(string $id)
    {
        // validate input data
        $data = request()->validate(
            [
                "name"=> "required|string",
                "email"=> "required|email",
                "img_cover"=> "nullable|file|image",
            ]
            );
            
        
        // validate if email input change
        if(session('user.email') != $data['email'])
        {
            $data['email'] = request()->validate(["email"=> "unique:users,email"])['email'];
            session(['user.email' => $data['email']]);
            
        }

        // store image profile in users dir
        if(request()->file('img_cover'))
        {
            $data['img_cover'] = request()->file('img_cover')->store('users');
        }

        User::find($id)->update($data);

        request()->session()->flash('alert' , 'Proflie Updated Successfully');

        return redirect()->route('user.edit' , ['user'=> $id]);

    }
}