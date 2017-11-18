<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;
use App\Forum;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        $users = User::orderBy('created_at','desc')->get();        
        return view('user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        if(Auth()->user()->id != $id){
            return redirect('/profile')->with('error' ,'You are not allowed to Show this User');
        }
    $user = User::find($id);
     return view('user.show',['user'=>$user]);  
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Auth()->user()->id != $id){
            return redirect('/profile')->with('error' ,'You are not allowed to Show this User');
        }
        $user = User::find($id);
        return view('user.edit',['user'=>$user]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            ]);
        $user= User::find($id);          
        $user->name= $request->input('name');
        $user->email= $request->input('email');
        $user->password= bcrypt($request->input('password'));
        $user->update();
        return redirect('/users/'.$id)->with('success' ,'Edit Done Successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);        
        if(Auth()->user()->id != $id){
            return redirect('/profile')->with('error' ,'You are not allowed to Show this User');
        }

        if($user->picture != 'userNoImage.jpg'){
            Storage::delete('/uploads/user_photo/',$user->picture);
        }
        $user->delete();
        return redirect('/')->with('success' ,'Delete  Successfully');
    }
}
