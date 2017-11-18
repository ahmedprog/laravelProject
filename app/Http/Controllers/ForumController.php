<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
class ForumController extends Controller
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
        $forums=  Forum::all();
        return view('forums.index' , ['forums'=>$forums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forums.create');
        
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
            'f_title'=>'required',
            'description'=>'required',
        ]);


        $forum= new Forum;
        $forum->f_title= $request->input('f_title');
        $forum->description= $request->input('description');
        $forum->user_id=auth()->user()->id;
        $forum->save();
        return redirect('/forums')->with('success' ,'Done Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $forum = Forum::findOrFail($id);

        return view('forums.show')->with('forum', $forum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(Auth()->user()->id !== Fourm::find($id)->user_id){
            return redirect('/posts')->with('error' ,'You are not allowed to edit here');
            
            }
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success' ,'Delete Successfully');
    }
}
