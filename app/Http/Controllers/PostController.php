<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Forum;
use App\Post;
class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();        
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $forum_inf = Forum::find($id);

        return view('posts.create',['forum'=>$forum_inf]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'subject'=>'required',
            'body'=>'required',
            'post_photo'=>'image|nullable|max:1024'
        ]);
        if($request->hasFile('post_photo')){
            $fileNameWitheExtension = $request->file('post_photo')->getClientOriginalName();
            $fileName= pathinfo($fileNameWitheExtension , PATHINFO_FILENAME);
            $extension  = $request->file('post_photo')->getClientOriginalExtension();
            $fileNameStore= $fileName .'_'.time() .'.'.$extension;
            // $path=$request->file('post_photo')->storeAs('public/post_photo',$fileNameStore);

            $request->file('post_photo')->move(public_path("/uploads/post_photo"), $fileNameStore);

        }else{

            $fileNameStore = 'postNoImage.jpg';
        
        }
        
        $post= new Post;
        $post->subject= $request->input('subject');
        $post->body= $request->input('body');
        $post->forum_id= $request->input('forum_id');
        $post->photo= $fileNameStore;
        $post->user_id=auth()->user()->id;
        $post->save();
        return redirect('/posts')->with('success' ,'Done Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::findOrFail($id);
        $comments=$post->comments;
        return View('posts.show',['post'=>$post,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth()->user()->id !== Post::find($id)->user_id){
        return redirect('/posts')->with('error' ,'You are not allowed to edit here');
        
        }
        $post= Post::findOrFail($id);
        return View('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'subject'=>'required',
            'body'=>'required',
            'post_photo'=>'image|nullable|max:1024'
        ]);
        if($request->hasFile('post_photo')){
            $fileNameWitheExtension = $request->file('post_photo')->getClientOriginalName();
            $fileName= pathinfo($fileNameWitheExtension , PATHINFO_FILENAME);
            $extension  = $request->file('post_photo')->getClientOriginalExtension();
            $fileNameStore= $fileName .'_'.time() .'.'.$extension;
            // $path=$request->file('post_photo')->storeAs('public/post_photo',$fileNameStore);

            $request->file('post_photo')->move(public_path("/uploads/post_photo"), $fileNameStore);

        }else{

            $fileNameStore = Post::find($id)->photo;
        
        }
        
        $post= Post::find($id);
        $post->subject= $request->input('subject');
        $post->body= $request->input('body');
        $post->photo= $fileNameStore;
        
            $post->update();
        return redirect('/posts')->with('success' ,'Edit Done Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        if(Auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error' ,'You are not allowed to edit here');
        }
        if($post->photo != 'postNoImage.jpg'){
            Storage::delete('pubilc/uploads/post_photo/',$post->photo);
        }
        $post->delete();
        return redirect('/posts')->with('success' ,'Delete Successfully');
        
    }
}
