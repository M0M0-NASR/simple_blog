<?php


namespace App\Http\Controllers;


class UserController extends Controller

{
    public function index()
    {
        $posts = [ ["id"=> 1 , "posted_by"=>"ali" , "created_at"=> "2022 2 2", "to"=>"me"]];
        return view("welcome" , compact("posts"));
    }
}