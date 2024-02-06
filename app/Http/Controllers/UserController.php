<?php



namespace App\Http\Controllers;

use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $user = request()->session()->get("user");
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
    }
}