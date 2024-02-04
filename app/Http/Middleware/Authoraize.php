<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authoraize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find($request->user_id);
        if($user->token !== $request->session()->get("user")['token'])
            return redirect()->route('posts.index')->with("alert" ,"Un Authrize Action");        
        
        return $next($request);
    }
}
