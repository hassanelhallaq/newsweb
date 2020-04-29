<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if($this->auth->guard('author')){
            $loginroute = 'cms.author.login_view';
            return route($loginroute);
            
        }else if($this->auth->guard('admin')){
                $loginroute = 'admin.loginView';
                return route($loginroute);
            }else if($this->auth->guard('user')){
                $loginroute = 'newsweb.index';
                return route($loginroute);
            }
        }
    
}
