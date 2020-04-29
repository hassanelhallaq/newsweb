<?php

namespace App\Http\Controllers\Auth;

use App\author as AppAuthor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author;

class AuthorAuthController extends Controller

{
    public function showLoginView(){
        return view('cms.author.auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest:author')->except('logout');
    }
   
    public function login(Request $request){
    
        $request->validate([
            'email'=>'required|string|email', 
            'password'=>'required|string|min:4|max:10',
        ]);
        
            $credentials = [
            'email'=>$request->email,
            'password'=>$request->password];

            if(Auth::guard('author')->attempt($credentials , true)){
                $user = Auth::guard('author')->user();
                if ($user->status == "active"){
                    return redirect()->route('author.dashboard');
      }else{
        return redirect()->back();

      }
   }
                }
        public function logout(){
            Auth::guard('author')->logout();
            return redirect()->route('cms.author.login_view');

        }
       
    
            }


