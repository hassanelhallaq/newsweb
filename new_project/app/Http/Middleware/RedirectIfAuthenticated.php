<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      
        if ($guard == 'author'){
            if (Auth::guard('author')->check()){
                $user = Auth::guard('author')->user();
                if ($user->status == "active"){
                    return redirect()->route('author.dashboard');
                } 
            } 
                }else if($guard == 'admin'){
                        if (Auth::guard('admin')->check()) {
                            $user = auth::guard('admin')->user();
                            if ($user->status == "active"){
                                return redirect()->route('admin.dashboard');
                            }
                    }
                    }
                    else if($guard == 'user'){
                        if (Auth::guard('user')->check()) {
                            $user = auth::guard('user')->user();
                            if ($user->status == "active"){
                                return redirect()->route('newsweb.index');
                            }else{
                                return redirect()->back();

                            }
                    }
                    }
                    // return redirect()->route('cms.author.blocked');
                
            
        
        return $next($request);
    }
}
