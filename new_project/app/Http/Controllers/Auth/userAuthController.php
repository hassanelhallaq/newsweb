<?php

namespace App\Http\Controllers\Auth;

use App\Artical;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userAuthController extends Controller
{

    public function ShowLogin(){
        return view('newsweb/login');
    }

    public function __construct()
    {
       $this->middleware('guest:user')->except('logout');

        
    }
    

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $credentials=(['email'=>$request->email,'password'=>$request->password]);
            if(Auth::guard('user')->attempt($credentials,true)){
                if (Auth::guard('user')->check()) {                    
                    $user = auth::guard('user')->user();
                    if ($user->status == "active"){ 
                    return redirect()->route('newsweb.index');
                }
            }
            }else{
                return redirect()->back();

            }
    }
  
    public function logout(){
        Auth::guard('user')->logout();
        return redirect()->route('newsweb.index');
    }
}
