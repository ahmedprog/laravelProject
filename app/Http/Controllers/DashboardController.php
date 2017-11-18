<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;
use App\Forum;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        
        return view('user.dashboard',['user'=>Auth::user(),'forums'=>Forum::all()]);  
    }
    public function uploadPhoto(Request $request)
    {
        $this->validate($request,[
            'user_photo'=>'required|image|max:1024',
        ]);
        //handle user to upload photo
        if($request->hasFile('user_photo')){
            $file = $request->file('user_photo');
            $fileName= 'user_' . time(). '.' .$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)
                              ->save(public_path('/uploads/user_photo/'.$fileName));
            $user = Auth::user();
            $user->picture = $fileName;
            return view('user.dashboard',['user'=>Auth::user(),'forums'=>Forum::all()]);              
        }
        
    }
 
}
