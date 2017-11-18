<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::orderBy('created_at','desc')->take(5)->get();        
        $allposts = Post::orderBy('created_at','desc')->get();        
        
        return view('home',['posts'=>$allposts ,'RecPosts'=>$posts ]);
    }
    
}
