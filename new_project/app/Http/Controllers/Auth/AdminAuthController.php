<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    public function ShowLogin(){
        return view('cms.admin.auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $credentials=(['email'=>$request->email,'password'=>$request->password]);

            if(Auth::guard('admin')->attempt($credentials,true)){
                
                if (Auth::guard('admin')->check()) {
                    $user = auth::guard('admin')->user();
                    if ($user->status == "active"){
                        return redirect()->route('admin.dashboard');
                }
            }
            }else{
                return redirect()->back();

            }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.logout');
    }
}
